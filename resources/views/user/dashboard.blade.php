<x-user-layout>
    <div class="flex min-h-screen bg-gray-50">
        {{-- Sidebar --}}
        @include('layouts-admin.sidebar')
    
        <style>
            html {
                scroll-behavior: smooth;
            }
        </style>
        <div class="pt-0 pb-32 bg-gradient-to-br from-[#000000] via-[#1a1a1a] to-[#db337f] min-h-screen">
            

            <div class="relative rounded-xl mb-8 overflow-hidden">
                <img src="{{ asset('images/badge1.jpg') }}" alt="Dashboard badge" 
                    class="w-full h-100 object-cover rounded-xl"  
                    style="filter: brightness(0.7);">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                <div class="absolute md:left-16 md:top-64 bottom-4 left-4 text-white text-2xl md:text-3xl font-bold drop-shadow-lg transition-opacity duration-300 opacity-100">
                    Welcome back<br>{{ Auth::user()->name }}!
                </div>
            </div>


        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 flex flex-col gap-6">

                
                <div class="py-4">
                    {{--<h2 class="font-semibold text-xl md:text-xl text-white leading-tight">Welcome to your Dashboard</h2>--}}
                    <h2 class="font-semibold text-xl md:text-2xl text-[#c9a14a] leading-tight">Explore your Dashboard</h2>
                </div>
                
                {{-- @push('scripts')
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>    
                <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
                
                <script>
                const ctx = document.getElementById('investmentChart').getContext('2d');
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
                                min: 0, // หรือ min: Math.min(...{!! json_encode($graphData) !!}) - 5
                                max: Math.max(...{!! json_encode($graphData) !!}) + (Math.max(...{!! json_encode($graphData) !!}) * 0.1),
                                grid: {
                                    color: '#ffe3f0'
                                },
                                ticks: {
                                    padding: 30,
                                    //display: false, // << close y-axis labels
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
                </script> 
                @endpush --}}
                
                {{-- <!-- Investments Section -->
                <div id="investments-statement" class="bg-white rounded-xl shadow-lg p-4 md:p-6 hover:shadow-2xl transition">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 16V8m0 0l-3 3m3-3l3 3"></path></svg>
                        <h3 class="text-lg font-bold text-[#db337f]">Investments Statement</h3>
                    </div>
                    <div class="overflow-x-auto">
                    <table class="min-w-full text-sm md:text-base mb-4">
                        <thead>
                            <tr class="bg-gray-50 text-gray-700 text-xs md:text-base">
                                <th class="py-2 px-2 whitespace-nowrap">Date</th>
                                <th class="py-2 px-2 whitespace-nowrap">Type</th>
                                <th class="py-2 px-2 whitespace-nowrap">Quantity</th>
                                <th class="py-2 px-2 whitespace-nowrap">Price/share</th>
                                <th class="py-2 px-2 whitespace-nowrap">Value</th>
                                <th class="py-2 px-2 whitespace-nowrap">Note</th>
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
                                            : '-$' . number_format($statement_item['price'], 4) }}
                                    </td>
                                    <td class="px-6 py-3 border-b border-[#db337f] {{ $statement_item['type'] == 'Investment' ? ' text-right' : ($statement_item['type'] == 'Sale' ? ' text-left text-[#db337f]' : '') }}">
                                        {{ $statement_item['type'] == 'Investment' 
                                            ? '$' . number_format($statement_item['price'] * $statement_item['shares'], 2) 
                                            : '-$' . number_format($statement_item['price'] * $statement_item['shares'], 2) }}
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

                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    </div>
                    <!-- Summary Section -->
                    @php
                        $totalShares = (collect($statements)->where('type', 'Investment')->sum('shares') - collect($statements)->where('type', 'Sale')->sum('shares'));
                        $totalInvestmentValue = collect($statements)
                            ->where('type', 'Investment')
                            ->map(function($item) {
                                return ($item['price'] * $item['shares']);
                            })
                            ->sum();
                        $totalSaleValue =  collect($statements)
                            ->where('type', 'Sale')
                            ->map(function($item) {
                                return $item['price'] * $item['shares'];
                            })
                            ->sum();
                        $totalValue = $totalInvestmentValue - $totalSaleValue;
                        $investmentCount = collect($statements)->where('type', 'Investment')->count();
                        $saleCount = collect($statements)->where('type', 'Sale')->count();
                    @endphp
                    <div class="mt-4 bg-[#ffe3f0] border border-[#db337f] rounded-lg p-3 md:p-4 text-[#db337f]">
                        <div class="font-bold mb-2">Summary</div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-4 text-base md:text-xl">
                            <div>Total Shares: <span class="font-semibold">{{ number_format($totalShares, 2) }}</span></div>
                            <div>Total Value: <span class="font-semibold">${{ number_format($totalValue, 2) }}</span></div>
                            <div>Investments: <span class="font-semibold">{{ $investmentCount }}</span></div>
                            <div>Sales: <span class="font-semibold">{{ $saleCount }}</span></div>

                        </div>
                    </div>
                </div>

                <!-- Interest Payments Section -->
                <div id="cash-payments" class="bg-white rounded-xl shadow-lg p-4 md:p-6 hover:shadow-2xl transition">
                    <div class="flex items-center gap-2 mb-4">
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><path d="M12 8v4l3 3"></path></svg>
                        <h3 class="text-lg font-bold text-[#db337f]">Cash Payments</h3>
                    </div>
                    <div class="overflow-x-auto">
                    <table class="min-w-full text-sm md:text-base mb-4">
                        <thead>
                            <tr class="bg-gray-50 text-gray-700 text-xs md:text-base">
                                <th class="py-2 px-2 whitespace-nowrap">Date</th>
                                <th class="py-2 px-2 whitespace-nowrap">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment_item)
                                <tr class="hover:bg-[#ffe3f0] transition">
                                    <td class="px-6 py-3 border-b border-[#db337f] text-gray-700">{{ $payment_item['paid_at'] }}</td>
                                    <td class="px-6 py-3 border-b border-[#db337f] text-right">
                                        ${{ number_format($payment_item['amount'], 2) }}
                                    </td>
                                </tr>
                            @endforeach

                            @php
                                $totalPayment = collect($payments)->sum('amount');
                            @endphp
                            <tr class="font-bold border-t transition">
                                <td class="px-6 py-3 border-b text-base">Total</td>
                                <td class="px-6 py-3 border-b text-[#db337f] text-right">${{ number_format($totalPayment, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>

                <!-- Monthly Statement Section -->
                <div id="Statement" class="bg-white rounded-xl shadow-lg p-4 md:p-6 hover:shadow-2xl transition">
                    <form id="statement-search-form" class="flex flex-wrap items-center gap-2 mb-4">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"></rect><path d="M16 2v4"></path></svg>
                        <h3 class="text-lg font-bold">Statement for</h3>
                        <input type="month" name="month" id="month-input" class="border rounded px-3 py-2 text-[#db337f] focus:ring focus:ring-blue-200 text-sm md:text-base"
                            value="{{ request('month', date('Y-m')) }}" />
                        <button type="submit" class="px-4 py-2 bg-[#db337f] text-white rounded hover:bg-[#b72c6a] text-sm md:text-base font-semibold shadow">Search</button>
                    </form>
                    <div class="overflow-x-auto w-full">
                        <div id="statement-table" class="min-w-[600px] text-xs md:text-base">
                            <!-- AJAX table will be loaded here -->
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    @push('scripts')
    <script>
        function loadStatementTable() {
            let month = document.getElementById('month-input').value;
            fetch("{{ route('dashboard.statement') }}?month=" + month)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('statement-table').innerHTML = html;
                });
        }

        document.getElementById('statement-search-form').addEventListener('submit', function(e) {
            e.preventDefault();
            loadStatementTable();
        });

        // โหลด statement table ครั้งแรกเมื่อหน้าเว็บโหลด
        window.addEventListener('DOMContentLoaded', function() {
            loadStatementTable();
        });
    </script>
    @endpush
</x-user-layout>