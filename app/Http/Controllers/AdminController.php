<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\Investment;
use App\Models\Sale;
use App\Models\Payment;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        $users = User::all();
        
        foreach ($users as $user) {
            $user->total_investment = Investment::where('user_id', $user->id)->sum('shares');
            $user->total_sale = Sale::where('user_id', $user->id)->sum('shares');
            $user->total_payment = Payment::where('user_id', $user->id)->sum('amount');
        }


        return view('admin.admin', compact('users'));
    }

    public function users(Request $request)
    {
        if ($request->ajax()) {
            $data = User::query();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                                       
                    $btn = '<a href="'.route('admin.users.investment', $row->id).'" class="px-3 py-1 bg-[#db337f] text-white rounded-lg shadow hover:bg-[#b72c6a] transition text-xs font-medium">Investment</a>';
                    $btn .= ' <a href="'.route('admin.users.edit', $row->id).'" class="px-3 py-1 bg-[#ffb6d5] text-[#db337f] rounded-lg shadow hover:bg-[#ffe3f0] transition text-xs font-medium border border-[#db337f]">Edit</a>';
                    $btn .= ' <button type="button" onclick="showDeleteModal('.$row->id.')" class="px-3 py-1 bg-[#db337f] text-white rounded-lg shadow hover:bg-red-600 transition text-xs font-medium border border-[#db337f]">Delete</button>';
                    $btn .= ' <a href="'.route('admin.users.resetpassword', $row->id).'" class="px-3 py-1 bg-[#ffe3f0] text-[#db337f] rounded-lg shadow hover:bg-[#ffb6d5] transition text-xs font-medium border border-[#db337f]">Reset Password</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.users');

    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        return view('admin.reset-password', compact('user'));
    }

    public function updatePassword($id)
    {
        $user = User::findOrFail($id);
        $validated = request()->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->password = bcrypt($validated['password']);
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Password updated successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    public function update($id)
    {
        $user = User::findOrFail($id);
        $user->update(request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:225',
            'date_of_birth' => 'required|date',
            'street_address' => 'required|string|max:255',
            'street_address_2' => 'nullable|string|max:255',
            'town' => 'required|string|max:255',
            'county' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'reinvest_interest' => 'nullable|boolean'
        ]));
        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    public function create()
    {        
        return view('admin.create');
    }

    public function store()
    {

        $validated = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        unset($validated['password']);

        User::create($validated);

        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    
    public function destroy($id)
    {
        if (request('confirmText') !== 'confirm') {
            return back()->with('error', 'Please type "confirm" to delete this user.');
        }
        $user = User::findOrFail($id);

        // Move record to user_temps - SOFT DELETE!
        DB::table('user_temps')->insert([
            'temp_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'date_of_birth' => $user->date_of_birth,
            'phone' => $user->phone,
            'street_address' => $user->street_address,
            'street_address_2' => $user->street_address_2,
            'town' => $user->town,
            'county' => $user->county,
            'postcode' => $user->postcode,
            'country' => $user->country
        ]);

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    // Investment Part
    public function investment($id) 
    {
        $user = User::findOrFail($id);
        $investments = Investment::where('user_id', $user->id)->get();

        $sales = Sale::where('user_id', $user->id)->get();

        $payment = Payment::where('user_id', $user->id)->get();

        // รวมข้อมูล 3 ส่วน
        $statements = collect();

        foreach ($investments as $inv) {
            $statements->push([
                'id' => $inv->id,
                'date' => $inv->invested_at,
                'type' => 'Investment',
                'shares' => $inv->shares,
                'price' => $inv->price / 100,
                'annual-benefit' => $inv->reinvestment,
                'complimentary' => $inv->complimentary,
                'transfer' => $inv->transfer,
            ]);
        }

        foreach ($sales as $sale) {
            $statements->push([
                'id' => $sale->id,
                'date' => $sale->sold_at,
                'type' => 'Sale',
                'shares' => $sale->shares,
                'price' => $sale->price / 100,
                'annual-benefit' => null,  // not have in sales
                'complimentary' => null,
                'transfer' => $sale->transfer,
            ]);
        }
        /*
        foreach ($payment as $pay) {
            $statements->push([
                'date' => \Carbon\Carbon::parse($pay->paid_at)->format('Y-m-d'),
                'type' => 'Payment',
                'price' => $pay->amount,
                'shares' => null,
                'note' => null  // not have in payments
            ]);
        }
            */

        // Sorting by date
        $statements = $statements->sortBy('date');

        // Prepare for Graph
        $graphLabels = $investments->sortBy('invested_at')->pluck('invested_at')->map(function($date) {
            return \Carbon\Carbon::parse($date)->format('Y-m-d');
        })->toArray();

        $graphData = $investments->sortBy('invested_at')->pluck('shares')->toArray();

        //replace paid_at with only date in $payment
        $payments = $payment->map(function($item) {
            $item->paid_at = \Carbon\Carbon::parse($item->paid_at)->format('Y-m-d');
            return $item;
        });

        //get allUser list
        $allUsers = User::all();

        return view('admin.investment', compact('investments','user', 'sales', 'payments', 'statements', 'graphLabels', 'graphData', 'allUsers'));
    }

    //---------------- Investment record ----------------
    public function storeInvestment($user_id)
    {

        $validated = request()->validate([
            'investment_shares' => 'required|numeric|min:1',
            'investment_price' => 'required|numeric|min:0.0001',
            'invested_at' => 'required|date',
            'benefit_type' => 'nullable|in:none,annual,complimentary',
        ]);

        

        $validated['user_id'] = $user_id;
        $validated['shares'] = $validated['investment_shares'];
        $validated['price'] = $validated['investment_price'] * 100; // convert to cents

        if ($validated['benefit_type'] === 'annual') {
            $validated['reinvestment'] = 1;
            $validated['complimentary'] = 0;
        } elseif ($validated['benefit_type'] === 'complimentary') {
            $validated['reinvestment'] = 0;
            $validated['complimentary'] = 1;
        } else {
            $validated['reinvestment'] = 0;
            $validated['complimentary'] = 0;
        }

        unset($validated['investment_shares']);
        unset($validated['investment_price']);
        Investment::create($validated);

        return redirect()->route('admin.users.investment', ['id' => $validated['user_id']])->with('success', 'Investment created successfully.');
    }
    
    public function destroyInvestment( $investment_id)
    {
        $investment = Investment::where('id', $investment_id)->firstOrFail();
        $investment->delete();

        return redirect()->route('admin.users.investment', ['id' => $investment->user_id])->with('success', 'Investment deleted successfully.');
    }

    public function editInvestment($id)
    {
        $investment = Investment::findOrFail($id);
        $investment->price = $investment->price / 100; // convert to dollars for editing
        return view('admin.edit_investment', compact('investment'));
    }
    public function updateInvestment($id)
    {
        $validated = request()->validate([
            'shares' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0.0001',
            'invested_at' => 'required|date',
            'benefit_type' => 'nullable|in:none,annual,complimentary',
        ]);

        
        $validated['price'] = $validated['price'] * 100; // convert to cents

        if ($validated['benefit_type'] === 'annual') {
            $validated['reinvestment'] = 1;
            $validated['complimentary'] = 0;
        } elseif ($validated['benefit_type'] === 'complimentary') {
            $validated['reinvestment'] = 0;
            $validated['complimentary'] = 1;
        } else {
            $validated['reinvestment'] = 0;
            $validated['complimentary'] = 0;
        }


        $investment = Investment::findOrFail($id);
        $investment->update($validated);

        return redirect()->route('admin.users.investment', ['id' => $investment->user_id])->with('success', 'Investment updated successfully.');
    }
    //---------------- Sale record ----------------
    public function storeSale($user_id)
    {
        $validated = request()->validate([
            'sales_shares' => 'required|numeric|min:1',
            'sales_price' => 'required|numeric|min:0.0001',
            'sold_at' => 'required|date',
        ]);
        $validated['user_id'] = $user_id;

        $validated['shares'] = $validated['sales_shares'];
        $validated['price'] = $validated['sales_price'] * 100; // convert to cents
        unset($validated['sales_shares']);
        unset($validated['sales_price']);

        Sale::create($validated);

        return redirect()->route('admin.users.investment', ['id' => $validated['user_id']])->with('success', 'Sale created successfully.');
    }
    
    public function destroySale( $sale_id)
    {
        $sale = Sale::where('id', $sale_id)->firstOrFail();
        $sale->delete();

        return redirect()->route('admin.users.investment', ['id' => $sale->user_id])->with('success', 'Sale deleted successfully.');
    }
    
    public function editSale($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->price = $sale->price / 100; // convert to dollars for editing
        return view('admin.edit_sale', compact('sale'));
    }
    public function updateSale($id)
    {
        $sale = Sale::findOrFail($id);

        $validated = request()->validate([
            'shares' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0.01',
            'sold_at' => 'required|date',
        ]);

        $validated['price'] = $validated['price'] * 100; // convert to cents
        $sale->update($validated);
        return redirect()->route('admin.users.investment', ['id' => $sale->user_id])->with('success', 'Sale updated successfully.');
    }


    //---------------- Payment record ----------------
    public function storePayment($user_id)
    {
        $validated = request()->validate([
            'payment_amount' => 'required|numeric|min:0.0001',
            'paid_at' => 'required|date',
        ]);
        
        $validated['user_id'] = $user_id;

        $validated['amount'] = $validated['payment_amount'];
        unset($validated['payment_amount']);

        Payment::create($validated);

        return redirect()->route('admin.users.investment', ['id' => $validated['user_id']])->with('success', 'Payment created successfully.');
    }
    public function destroyPayment( $payment_id)
    {
        $payment = Payment::where('id', $payment_id)->firstOrFail();
        $payment->delete();

        return redirect()->route('admin.users.investment', ['id' => $payment->user_id])->with('success', 'Payment deleted successfully.');
    }

    public function editPayment($id)
    {
        $payment = Payment::findOrFail($id);
        //replace paid_at with only date in $payment
        $payment->paid_at = \Carbon\Carbon::parse($payment->paid_at)->format('Y-m-d');
        return view('admin.edit_payment', compact('payment'));
    }

    public function updatePayment($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->update(request()->validate([
            'amount' => 'required|numeric|min:0.01',
            'paid_at' => 'required|date',
        ]));
        return redirect()->route('admin.users.investment', ['id' => $payment->user_id])->with('success', 'Payment updated successfully.');
    }

    public function exportUsers(Request $request)
    {
        $startMonth = $request->input('start_month');
        $endMonth = $request->input('end_month');


        $startDate = $startMonth ? \Carbon\Carbon::parse($startMonth)->startOfMonth() : null;
        $endDate = $endMonth ? \Carbon\Carbon::parse($endMonth)->endOfMonth() : null;

        return Excel::download(
            new UsersExport($startDate, $endDate),
            'Exportusers_bymonth_' . now()->format('Ymd') . '.csv'
        );
        
    }

    public function transferInvestment($user_id)
    {
        // transfer investmemt shares to another user
        $validated = request()->validate([
            'target_user_id' => 'required|exists:users,id|different:user_id',
            'transfer_shares' => 'required|numeric|min:1',
            'transfer_amount' => 'required|numeric|min:0.0001',
            'transfer_at' => 'required|date',
        ]);

        Sale::create([
            'user_id' => $user_id,
            'shares' => $validated['transfer_shares'],
            'price' => $validated['transfer_amount'] * 100, // convert to cents
            'sold_at' => $validated['transfer_at'],
            'transfer' => 1,
            'transfer_to' => $validated['target_user_id'],
        ]);

        Investment::create([
            'user_id' => $validated['target_user_id'],
            'shares' => $validated['transfer_shares'],
            'price' => $validated['transfer_amount'] * 100, // convert to cents
            'invested_at' => $validated['transfer_at'],
            'transfer' => 1,
            'transfer_from' => $user_id,
        ]);

        
        return redirect()->route('admin.users.investment', ['id' => $user_id])->with('success', 'Transfer completed successfully.');
    }

    public function findByMonth(Request $request)
    {
        $startMonth = $request->input('start_month');
        $endMonth = $request->input('end_month');

        // convert to date range
        $startDate = $startMonth ? \Carbon\Carbon::parse($startMonth)->startOfMonth() : null;
        $endDate = $endMonth ? \Carbon\Carbon::parse($endMonth)->endOfMonth() : null;
        
        
        $users = User::all();
        
        foreach ($users as $user) {
            $user->total_investment = Investment::where('user_id', $user->id)
                ->whereBetween('invested_at', [$startDate, $endDate])
                ->sum('shares');
            
            $user->total_sale = Sale::where('user_id', $user->id)
                ->whereBetween('sold_at', [$startDate, $endDate])
                ->sum('shares');
            
            $user->total_payment = Payment::where('user_id', $user->id)
                ->whereBetween('paid_at', [$startDate, $endDate])
                ->sum('amount');
        }


        return view('admin.admin', compact('users'));

        /*
        // ดึงข้อมูล user ที่มี investment, sale หรือ payment ในช่วงเดือนที่เลือก
        $users = User::with(['investments', 'sales', 'payments'])
            ->when($startDate && $endDate, function($query) use ($startDate, $endDate) {
                $query->whereHas('investments', function($q) use ($startDate, $endDate) {
                    $q->whereBetween('invested_at', [$startDate, $endDate]);
                })
                ->orWhereHas('sales', function($q) use ($startDate, $endDate) {
                    $q->whereBetween('sold_at', [$startDate, $endDate]);
                })
                ->orWhereHas('payments', function($q) use ($startDate, $endDate) {
                    $q->whereBetween('paid_at', [$startDate, $endDate]);
                });
            })
            ->get();
        */
        // ส่งกลับไปที่ view เดิม
       // return view('admin.admin', compact('users'));
    }

}
