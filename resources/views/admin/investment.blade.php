<x-app-layout>

    <div class="py-12 pb-36 bg-gradient-to-br from-[#000000] via-[#1a1a1a] to-[#db337f] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <h3 class="font-bold text-xl text-[#db337f]">Investment Management for {{ $user->name }} ({{ $user->email }})</h3>
                <a href="{{ route('admin.users') }}" class="px-4 py-2 bg-[#db337f] text-white rounded hover:bg-[#b72c6a] text-sm shadow transition">Back</a>
            </div>
            @if (session('success'))
                <div id="success-alert" class="mb-4 px-4 py-3 rounded bg-[#ffe3f0] text-[#db337f] border border-[#db337f] flex justify-between items-center shadow">
                    <span>{{ session('success') }}</span>
                    <button type="button" onclick="document.getElementById('success-alert').style.display='none'" class="ml-4 text-[#db337f] hover:text-red-600 font-bold text-xl leading-none">&times;</button>
                </div>
                <script>
                    setTimeout(function() {
                        const alert = document.getElementById('success-alert');
                        if (alert) alert.style.display = 'none';
                    }, 10000);
                </script>
            @endif
            
                
                <!-- Graph Section -->
                <div class="bg-white p-6 rounded-xl shadow-lg mt-8">
                    <h4 class="font-bold text-lg mb-4 text-[#db337f]">Investments Graph</h4>
                    <canvas id="investmentGraph" height="120"></canvas>
                </div>

                <!-- Statement Section -->
                <div class="bg-white p-6 rounded-xl shadow-lg mt-12">
                    <h4 class="font-bold text-lg mb-4 text-[#db337f]">Investments Statement</h4>
                    <table class="min-w-full border border-[#db337f] rounded-xl overflow-hidden shadow-lg">
                        <thead>
                            <tr class="bg-[#db337f] text-white text-base">
                                <th class="px-6 py-3 border-b border-[#db337f] font-semibold">Date</th>
                                <th class="px-6 py-3 border-b border-[#db337f] font-semibold">Type</th>
                                <th class="px-6 py-3 border-b border-[#db337f] font-semibold">Quantity</th>
                                <th class="px-6 py-3 border-b border-[#db337f] font-semibold">Price per share</th>
                                <th class="px-6 py-3 border-b border-[#db337f] font-semibold">Value</th>
                                <th class="px-6 py-3 border-b border-[#db337f] font-semibold">Note</th>
                                <th class="px-6 py-3 border-b border-[#db337f] font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($statements as $statement_item)
                                <tr class="hover:bg-[#ffe3f0] transition">
                                    <td class="px-6 py-3 border-b border-[#db337f] text-gray-700">{{ $statement_item['date'] }}</td>
                                    <td class="px-6 py-3 border-b border-[#db337f]{{ $statement_item['type'] == 'Investment' ? ' text-right' : ($statement_item['type'] == 'Sale' ? ' text-left text-[#db337f]' : '') }}">
                                        {{ $statement_item['type'] }}
                                    </td>
                                    <td class="px-6 py-3 border-b border-[#db337f]{{ $statement_item['type'] == 'Investment' ? ' text-right' : ($statement_item['type'] == 'Sale' ? ' text-left text-[#db337f]' : '') }}">
                                        {{ $statement_item['type'] == 'Investment' 
                                            ? number_format($statement_item['shares'], 2) . ' Shares' 
                                            : '- ' . number_format($statement_item['shares'], 2) . ' Shares' }}
                                    </td>
                                    <td class="px-6 py-3 border-b border-[#db337f]{{ $statement_item['type'] == 'Investment' ? ' text-right' : ($statement_item['type'] == 'Sale' ? ' text-left text-[#db337f]' : '') }}">
                                        {{ $statement_item['type'] == 'Investment' 
                                            ? '$' . number_format($statement_item['price'], 4) 
                                            : '- $' . number_format($statement_item['price'], 4) }}
                                    </td>
                                    <td class="px-6 py-3 border-b border-[#db337f] {{ $statement_item['type'] == 'Investment' ? ' text-right' : ($statement_item['type'] == 'Sale' ? ' text-left text-[#db337f]' : '') }}">
                                        {{ $statement_item['type'] == 'Investment' 
                                            ? '$' . number_format($statement_item['price'] * $statement_item['shares'], 2) 
                                            : '- $' . number_format($statement_item['price'] * $statement_item['shares'], 2) }}
                                    </td>
                                    <td class="px-6 py-3 border-b border-[#db337f] text-center">
                                        @if ($statement_item['complimentary'] == 0 && $statement_item['annual-benefit'] == 1 && $statement_item['transfer'] == 0) 
                                            Annual Benefit
                                        @elseif ($statement_item['complimentary'] == 1 && $statement_item['annual-benefit'] == 0 && $statement_item['transfer'] == 0)
                                            Complimentary
                                        @elseif ($statement_item['transfer'] == 1 && $statement_item['annual-benefit'] == 0 && $statement_item['complimentary'] == 0)
                                            Transfer
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td class="px-6 py-3 border-b border-[#db337f]">
                                        <a href="{{ $statement_item['type'] == 'Investment' ? route('admin.investments.edit', $statement_item['id']) : route('admin.sales.edit', $statement_item['id']) }}" class="text-blue-500 hover:underline">Edit</a>
                                        <button type="button"
                                            class="text-red-500 hover:underline"
                                            onclick="showDeleteModal('{{ $statement_item['type'] }}', '{{ $statement_item['id'] }}')">
                                            Delete
                                        </button>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Summary Section -->
                    @php
                        $totalShares = (collect($statements)->where('type', 'Investment')->sum('shares') - collect($statements)->where('type', 'Sale')->sum('shares'));
                        $totalInvestmentValue = collect($statements)
                            ->where('type', 'Investment')
                            ->map(function($item) {
                                return ($item['price'] / 100) * $item['shares'];
                            })
                            ->sum();
                        $totalSaleValue =  collect($statements)
                            ->where('type', 'Sale')
                            ->map(function($item) {
                                return ($item['price'] / 100) * $item['shares'];
                            })
                            ->sum();
                        $totalValue = $totalInvestmentValue;
                        $investmentCount = collect($statements)->where('type', 'Investment')->count();
                        $saleCount = collect($statements)->where('type', 'Sale')->count();
                    @endphp
                    <div class="mt-6 bg-[#ffe3f0] border border-[#db337f] rounded-lg p-4 text-[#db337f]">
                        <div class="font-bold mb-2">Summary</div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-lg">
                            <div>Total Shares: <span class="font-semibold">{{ number_format($totalShares, 2) }}</span></div>
                            <div>Total Value: <span class="font-semibold">${{ number_format($totalValue, 2) }}</span></div>
                            <div>Investments: <span class="font-semibold">{{ $investmentCount }}</span></div>
                            <div>Sales: <span class="font-semibold">{{ $saleCount }}</span></div>
                            
                        </div>
                    </div>
                </div>

                <!-- Investment Payment Section -->
                <div class="bg-white p-6 rounded-xl shadow-lg mt-12">
                    <h4 class="font-bold text-lg mb-4 text-[#db337f]">Cash Payments</h4>
                    <table class="min-w-full border border-[#db337f] rounded-xl overflow-hidden shadow-lg">
                        <thead>
                            <tr class="bg-[#db337f] text-white text-base">
                                <th class="px-6 py-3 border-b border-[#db337f] font-semibold">Date</th>
                                <th class="px-6 py-3 border-b border-[#db337f] font-semibold">Amount</th>
                                <th class="px-6 py-3 border-b border-[#db337f] font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment_item)
                                <tr class="hover:bg-[#ffe3f0] transition">
                                    <td class="px-6 py-3 border-b border-[#db337f] text-center text-gray-700">{{ $payment_item['paid_at'] }}</td>
                                    <td class="px-6 py-3 border-b border-[#db337f] text-center text-[#db337f] font-semibold">${{ number_format($payment_item['amount'], 2) }}</td>
                                    <td class="px-6 py-3 border-b border-[#db337f] text-center">
                                        <a href="{{ route('admin.payments.edit', $payment_item['id']) }}" class="text-blue-500 hover:underline">Edit</a>
                                        <button type="button"
                                            class="text-red-500 hover:underline"
                                            onclick="showDeleteModal('Payment', '{{ $payment_item['id'] }}')">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Summary Payment Section -->
                    @php
                        $totalPayment = collect($payments)->sum('amount');
                        $paymentCount = collect($payments)->count();
                    @endphp
                    <div class="mt-6 bg-[#ffe3f0] border border-[#db337f] rounded-lg p-4 text-[#db337f]">
                        <div class="font-bold mb-2">Summary Cash Payments</div>
                        <div class="grid grid-cols-2 md:grid-cols-2 gap-2 text-xl">
                            <div>Total Cash Payments Amount: <span class="font-semibold">${{ number_format($totalPayment, 2) }}</span></div>
                            <div>Cash Payments: <span class="font-semibold">{{ $paymentCount }}</span></div>
                        </div>

                        
                    </div>
                </div>

                
                <div class="bg-white p-6 rounded-xl shadow-lg mt-12">
                    <h4 class="font-bold text-lg mb-4 text-[#db337f]">Add Investment</h4>

                    @if ($errors->any())
                        <div class="max-w-lg mx-auto">
                            <div class="bg-[#ffe3f0] border border-[#db337f] text-[#db337f] px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Error!</strong>
                                <ul class="mt-2 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <script>
                            window.onload = function() {
                                @foreach ($errors->keys() as $field)
                                    document.querySelector('[name="{{ $field }}"]').focus();
                                    return;
                                @endforeach
                            }
                        </script>
                    @endif
                    <!-- Investment Section -->
                    <form action="{{ route('admin.investments.store', $user->id) }}" method="POST" class="space-y-6 max-w-lg mx-auto ">
                        @csrf
                        <div class="relative my-8">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-[#db337f]"></div>
                            </div>
                            <div class="relative flex justify-start">
                                <span class="bg-white pr-3 text-xl font-extrabold text-[#db337f] tracking-wide">Investment</span>
                            </div>
                        </div>
                        <div>
                            <label for="investment_shares" class="block font-medium mb-1 text-[#db337f]">Shares</label>
                            <input type="number" name="investment_shares" id="investment_shares" value="{{ old('investment_shares') }}" min="0" placeholder="0.00"
                                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                        </div>
                        <div>
                            <label for="investment_price" class="block font-medium mb-1 text-[#db337f]">Price per share ($)</label>
                            <input type="number"  name="investment_price" id="investment_price" value="{{ old('investment_price') }}" min="0.0000" placeholder="0.0000" step="0.0001"
                                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                        </div>
                        <div>
                            <label for="invested_at" class="block font-medium mb-1 text-[#db337f]">Invested at</label>
                            <input type="date" name="invested_at" id="invested_at"
                                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]" placeholder="mm/dd/yyyy" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="flex items-center gap-4">
                            <div>
                                <input type="radio" name="benefit_type" id="no_benefit" value="none" checked>
                                <label for="no_benefit" class="font-medium text-[#db337f]">None</label>
                            </div>
                            <div>
                                <input type="radio" name="benefit_type" id="annual_benefit" value="annual">
                                <label for="annual_benefit" class="font-medium text-[#db337f]">Annual Benefit</label>
                            </div>
                            <div>
                                <input type="radio" name="benefit_type" id="complimentary" value="complimentary">
                                <label for="complimentary" class="font-medium text-[#db337f]">Complimentary</label>
                            </div>
                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="submit" class="px-4 py-2 bg-[#db337f] text-white rounded-lg hover:bg-[#b72c6a] shadow transition">Add Investment</button>
                        </div>
                    </form>

                    

                    <!-- Sales Section -->
                    <form action="{{ route('admin.sales.store', $user->id) }}" method="POST" class="space-y-6 max-w-lg mx-auto">
                        @csrf
                        <div class="relative my-8">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-[#db337f]"></div>
                            </div>
                            <div class="relative flex justify-start">
                                <span class="bg-white pr-3 text-xl font-extrabold text-[#db337f] tracking-wide">Sales</span>
                            </div>
                        </div>
                        <div>
                            <label for="sales_shares" class="block font-medium mb-1 text-[#db337f]">Shares</label>
                            <input type="number" name="sales_shares" id="sales_shares" value="{{ old('sales_shares') }}" min="0" placeholder="0.00"
                                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                        </div>
                        <div>
                            <label for="sales_price" class="block font-medium mb-1 text-[#db337f]">Price per share ($)</label>
                            <input type="number" name="sales_price" id="sales_price" value="{{ old('sales_price') }}" min="0.0000" placeholder="0.0000" step="0.0001"
                                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                        </div>
                        <div>
                            <label for="sold_at" class="block font-medium mb-1 text-[#db337f]">Sold at</label>
                            <input type="date" name="sold_at" id="sold_at"
                                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]" placeholder="mm/dd/yyyy" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="submit" class="px-4 py-2 bg-[#db337f] text-white rounded-lg hover:bg-[#b72c6a] shadow transition">Add Sale</button>
                        </div>
                    </form>
                    

                    <!-- Payments Section -->
                    <form action="{{ route('admin.payments.store', $user->id) }}" method="POST" class="space-y-6 max-w-lg mx-auto">
                        @csrf
                        <div class="relative my-8">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-[#db337f]"></div>
                            </div>
                            <div class="relative flex justify-start">
                                <span class="bg-white pr-3 text-xl font-extrabold text-[#db337f] tracking-wide">Cash Payments</span>
                            </div>
                        </div>
                        <div>
                            <label for="payment_amount" class="block font-medium mb-1 text-[#db337f]">Amount ($)</label>
                            <input type="number" name="payment_amount" id="payment_amount" value="{{ old('payment_amount') }}" min="0.00" placeholder="0.00" step="0.01"
                                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]">
                        </div>
                        <div>
                            <label for="paid_at" class="block font-medium mb-1 text-[#db337f]">Paid at</label>
                            <input type="date" name="paid_at" id="paid_at"
                                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]" placeholder="mm/dd/yyyy" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="flex justify-end gap-2">
                            <button type="submit" class="px-4 py-2 bg-[#db337f] text-white rounded-lg hover:bg-[#b72c6a] shadow transition">Add Payment</button>
                        </div>
                    </form>
                    
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg mt-12">
                    <h4 class="font-bold text-lg mb-4 text-[#db337f]">Transfer Shares</h4>
                    <form action="{{ route('admin.investments.transfer', $user->id) }}" method="POST" class="space-y-6 max-w-lg mx-auto">
                        @csrf
                        <div>
                            <label for="target_user_id" class="block font-medium mb-1 text-[#db337f]">Transfer to User</label>
                            <select name="target_user_id" id="target_user_id" class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]" required>
                                <option value="">-- Select User --</option>
                                
                                
                                @foreach ($allUsers as $targetUser)
                                    @if ($targetUser->id !== $user->id)
                                        <option value="{{ $targetUser->id }}">{{ $targetUser->name }} ({{ $targetUser->email }})</option>
                                    @endif
                                @endforeach
                                
                            </select>
                        </div>
                        <div>
                            <label for="transfer_shares" class="block font-medium mb-1 text-[#db337f]">Shares to Transfer</label>
                            <input type="number" name="transfer_shares" id="transfer_shares" placeholder="0"  min="1" max="{{ $totalShares }}" class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]" required>
                            <div class="text-sm text-gray-500 mt-1">Available shares: {{ number_format($totalShares, 2) }}</div>
                        </div>
                        <div>
                            <label for="transfer_amount" class="block font-medium mb-1 text-[#db337f]">Price per share to Transfer ($)</label>
                            <input type="number" name="transfer_amount" id="transfer_amount" step="0.0001" placeholder="0.0000" min="0.0000"  class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]" required>

                        </div>
                        <div>
                            <label for="transfer_at" class="block font-medium mb-1 text-[#db337f]">Transfer at</label>
                            <input type="date" name="transfer_at" id="transfer_at"
                                class="w-full border border-[#db337f] rounded-lg px-3 py-2 focus:ring focus:ring-[#db337f]" placeholder="mm/dd/yyyy" value="{{ date('Y-m-d') }}">
                        </div>

                        <div class="flex justify-end gap-2">
                            <button type="submit" class="px-4 py-2 bg-[#db337f] text-white rounded-lg hover:bg-[#b72c6a] shadow transition">Transfer Shares</button>
                        </div>
                    </form>

                   

                    @if ($errors->transfer->any())
                        <div class="max-w-lg mx-auto mt-4">
                            <div class="bg-[#ffe3f0] border border-[#db337f] text-[#db337f] px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Error!</strong>
                                <ul class="mt-2 list-disc list-inside">
                                    @foreach ($errors->transfer->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-sm shadow-lg border border-[#db337f]">
            <h3 class="font-bold text-lg mb-2 text-[#db337f]">Confirm Delete</h3>
            <p class="mb-4 text-sm">Type <span class="font-bold text-[#db337f]">confirm</span> to confirm deletion of this transaction</p>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <input type="text" id="confirmText" name="confirmText" class="border border-[#db337f] rounded px-3 py-2 w-full mb-3 focus:ring focus:ring-[#db337f]" placeholder="Type confirm">
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="hideDeleteModal()" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-[#db337f] text-white rounded hover:bg-[#b72c6a]" id="deleteBtn" disabled>Delete</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <script>
        const ctx = document.getElementById('investmentGraph').getContext('2d');
        const investmentGraph = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($graphLabels) !!},
                datasets: [{
                    label: 'Investment Shares',
                    data: {!! json_encode($graphData) !!},
                    borderColor: '#c9a14a',
                    backgroundColor: 'rgba(219, 51, 127, 0.1)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    datalabels: {
                        anchor: 'center',
                        align: 'top',
                        color: '#db337f',
                        font: {
                            weight: 'bold'
                        },
                        clip: false,
                        formatter: function(value, context) {
                            return ['Shares:', value.toLocaleString()];
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0,
                        max: Math.max(...{!! json_encode($graphData) !!}) + (Math.max(...{!! json_encode($graphData) !!}) * 0.1),
                        
                        grid: {
                            color: '#ffe3f0'
                        },
                        ticks: {
                            padding: 30,
                            color: '#db337f'
                        }
                    },
                    x: {
                        grid: {
                            color: '#ffe3f0'
                        },
                        ticks: {
                            color: '#db337f'
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });

        function showDeleteModal(type, id) {
            let form = document.getElementById('deleteForm');
            if(type === 'Investment') {
                form.action = '{{ route('admin.investments.destroy', 'ID_REPLACE') }}'.replace('ID_REPLACE', id);
            } else if (type == 'Sale') {
                form.action = '{{ route('admin.sales.destroy', 'ID_REPLACE') }}'.replace('ID_REPLACE', id);
            } else if (type == 'Payment') {
                form.action = '{{ route('admin.payments.destroy', 'ID_REPLACE') }}'.replace('ID_REPLACE', id);
            } else {
                return false;
            }

            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('confirmText').value = '';
            document.getElementById('deleteBtn').disabled = true;
        }
        function hideDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
        document.getElementById('confirmText').addEventListener('input', function() {
            document.getElementById('deleteBtn').disabled = this.value.trim().toLowerCase() !== 'confirm';
        });
    </script>
    @endpush
</x-app-layout>