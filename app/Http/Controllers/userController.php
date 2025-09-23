<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\Investment;
use App\Models\Sale;
use App\Models\Payment;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf; 


class UserController extends Controller
{
    public function userDashboard()
    {
        // $investments = Investment::where('user_id', auth()->user()->id)->get();        
        // $sales = Sale::where('user_id', auth()->user()->id)->get();

        // $payments = Payment::where('user_id', auth()->user()->id)->get();
        // // รวมข้อมูล 2 ส่วน
        // $statements = collect();
        
        // foreach ($investments as $inv) {
        //     $statements->push([
        //         'id' => $inv->id,
        //         'date' => $inv->invested_at,
        //         'type' => 'Investment',
        //         'shares' => $inv->shares,
        //         'price' => $inv->price / 100,
        //         'annual-benefit' => $inv->reinvestment,
        //         'complimentary' => $inv->complimentary,
        //         'transfer' => $inv->transfer,
        //     ]);
        // }

        // foreach ($sales as $sale) {
        //     $statements->push([
        //         'id' => $sale->id,
        //         'date' => $sale->sold_at,
        //         'type' => 'Sale',
        //         'shares' => $sale->shares,
        //         'price' => $sale->price / 100,
        //         'annual-benefit' => null,
        //         'complimentary' => null,
        //         'transfer' => $sale->transfer,
        //     ]);
        // }

        // // Sorting by date
        // $statements = $statements->sortBy('date');

        // // Prepare for Graph
        // $graphLabels = $investments->pluck('invested_at')->map(function($date) {
        //     return \Carbon\Carbon::parse($date)->format('Y-m-d');
        // })->toArray();

        // $graphData = $investments->pluck('shares')->toArray();

        // //replace paid_at with only date in $payment
        // $payments = $payments->map(function($item) {
        //     $item->paid_at = \Carbon\Carbon::parse($item->paid_at)->format('Y-m-d');
        //     return $item;
        // });

        //return view('admin.investment', compact('investments','user', 'sales', 'payment', 'statements', 'graphLabels', 'graphData'));
        return view('user.dashboard');
    }

    public function getStatementByMonth(Request $request)
    {
        $month = $request->input('month', date('Y-m'));

        list($year, $mon) = explode('-', $month);

        // หาวันแรกของปีแรกที่มีข้อมูล และวันสุดท้ายของเดือนที่เลือก
        $startDate = '1900-01-01'; // หรือจะใช้ปีแรกที่มีข้อมูลก็ได้
        $endDate = \Carbon\Carbon::createFromDate($year, $mon, 1)->endOfMonth()->format('Y-m-d');

        $investments = Investment::where('user_id', auth()->user()->id)
            ->whereDate('invested_at', '<=', $endDate)
            ->get();

        $sales = Sale::where('user_id', auth()->user()->id)
            ->whereDate('sold_at', '<=', $endDate)
            ->get();

        $payments = Payment::where('user_id', auth()->user()->id)
            ->whereDate('paid_at', '<=', $endDate)
            ->get();
        /*
        $investments = Investment::where('user_id', auth()->user()->id)
            ->whereYear('invested_at', $year)
            ->whereMonth('invested_at', $mon)
            ->get();

        $sales = Sale::where('user_id', auth()->user()->id)
            ->whereYear('sold_at', $year)
            ->whereMonth('sold_at', $mon)
            ->get();

        $payments = Payment::where('user_id', auth()->user()->id)
            ->whereYear('paid_at', $year)
            ->whereMonth('paid_at', $mon)
            ->get();
        */

        // รวมข้อมูล 3 ส่วน
        $reportStatements = collect();
        
        foreach ($investments as $inv) {
            $reportStatements->push([
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
            $reportStatements   ->push([
                'id' => $sale->id,
                'date' => $sale->sold_at,
                'type' => 'Sale',
                'shares' => $sale->shares,
                'price' => $sale->price / 100,
                'annual-benefit' => null,
                'complimentary' => null,
                'transfer' => $sale->transfer,
            ]);
        }

        foreach ($payments as $payment) {
            $reportStatements->push([
                'id' => $payment->id,
                'date' => \Carbon\Carbon::parse($payment->paid_at)->format('Y-m-d'),
                'type' => 'Payment',
                'shares' => null,
                'price' => $payment->amount,
                'annual-benefit' => null,
                'complimentary' => null,
                'transfer' => null,
            ]);
        }

        // Sorting by date
        $reportStatements = $reportStatements->sortBy('date');


        return view('partials.statement-table', compact('reportStatements'));
    }

    
    public function exportStatementPdf(Request $request)
    {
        $month = $request->input('month', date('Y-m'));
        
        list($year, $mon) = explode('-', $month);

        // หาวันแรกของปีแรกที่มีข้อมูล และวันสุดท้ายของเดือนที่เลือก
        $startDate = '1900-01-01'; // หรือจะใช้ปีแรกที่มีข้อมูลก็ได้
        $endDate = \Carbon\Carbon::createFromDate($year, $mon, 1)->endOfMonth()->format('Y-m-d');

        $investments = Investment::where('user_id', auth()->user()->id)
            ->whereDate('invested_at', '<=', $endDate)
            ->get();

        $sales = Sale::where('user_id', auth()->user()->id)
            ->whereDate('sold_at', '<=', $endDate)
            ->get();

        $payments = Payment::where('user_id', auth()->user()->id)
            ->whereDate('paid_at', '<=', $endDate)
            ->get();

        // รวมข้อมูล 3 ส่วน
        $reportStatements = collect();
        
        foreach ($investments as $inv) {
            $reportStatements->push([
                'id' => $inv->id,
                'date' => $inv->invested_at,
                'type' => 'Investment',
                'shares' => $inv->shares,
                'price' => $inv->price / 100    ,
                'annual-benefit' => $inv->reinvestment,
                'complimentary' => $inv->complimentary,
                'transfer' => $inv->transfer,
            ]);
        }

        foreach ($sales as $sale) {
            $reportStatements   ->push([
                'id' => $sale->id,
                'date' => $sale->sold_at,
                'type' => 'Sale',
                'shares' => $sale->shares,
                'price' => $sale->price / 100,
                'annual-benefit' => null,
                'complimentary' => null,
                'transfer' => $sale->transfer,
            ]);
        }

        foreach ($payments as $payment) {
            $reportStatements->push([
                'id' => $payment->id,
                'date' => \Carbon\Carbon::parse($payment->paid_at)->format('Y-m-d'),
                'type' => 'Payment',
                'shares' => null,
                'price' => $payment->amount,
                'annual-benefit' => null,
                'complimentary' => null,
                'transfer' => null,
            ]);
        }

        // Sorting by date
        $reportStatements = $reportStatements->sortBy('date');
        

        // สร้าง PDF จาก view partial หรือ view ใหม่
        $pdf = Pdf::loadView('partials.statement-table-pdf', compact('reportStatements'))
            ->setPaper('a4')
            ->setOption('margin-bottom', 0);

        return $pdf->download(auth()->user()->name . '-statement-' . date('Y-m') . '.pdf');
    }

}
