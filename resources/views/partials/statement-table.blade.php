<table class="min-w-full text-left mb-4">
    <thead>
        <tr class="bg-gray-50 text-gray-700 text-center">
            <th class="py-2 px-2">Date</th>
            <th class="py-2 px-2">Type</th>
            <th class="py-2 px-2">Quantity</th>
            <th class="py-2 px-2">Price/share</th>
            <th class="py-2 px-2">Value</th>
            <th class="py-2 px-2">Note</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reportStatements as $reportStatement_item)
            <tr class="hover:bg-blue-50">
                <td>
                    {{ $reportStatement_item['date'] }}
                </td>
                <td class="text-center pr-4">
                    @if($reportStatement_item['type'] == 'Investment')
                        {{ $reportStatement_item['type'] }}
                    @elseif($reportStatement_item['type'] == 'Sale')
                        <span class="text-left block text-[#db337f]">{{ $reportStatement_item['type'] }}</span>    
                    @elseif($reportStatement_item['type'] == 'Payment')
                        {{ $reportStatement_item['type'] }}                
                    @endif                    
                </td>
                <td class="text-right pr-4">
                    @if($reportStatement_item['type'] == 'Investment')
                        {{ number_format($reportStatement_item['shares'], 2) }} shares
                    @elseif($reportStatement_item['type'] == 'Sale')
                        <span class="text-left block text-[#db337f]">-{{ number_format($reportStatement_item['shares'], 2) }} shares</span>
                    @else
                      {{-- payment --}}
                    @endif
                </td>
                <td class="text-right pr-4">
                    @if($reportStatement_item['type'] == 'Investment' )
                        ${{ number_format($reportStatement_item['price'], 4) }}
                    @elseif($reportStatement_item['type'] == 'Sale')
                        <span class="block text-left text-[#db337f]">-${{ number_format($reportStatement_item['price'], 4) }}</span>
                    @endif
                </td>
                <td class="text-right pr-4">
                    @if($reportStatement_item['type'] == 'Investment')
                       ${{ number_format($reportStatement_item['price'] * $reportStatement_item['shares'], 2) }}
                    @elseif($reportStatement_item['type'] == 'Sale')
                        <span class="block text-left text-[#db337f]">-${{ number_format($reportStatement_item['price'] * $reportStatement_item['shares'], 2) }}</span>
                    @elseif($reportStatement_item['type'] == 'Payment')
                        ${{ number_format($reportStatement_item['price'] , 2) }}
                    @endif
                </td>
                <td class="text-center">
                    @if ($reportStatement_item['complimentary'] == 0 && $reportStatement_item['annual-benefit'] == 1 && $reportStatement_item['transfer'] == 0) 
                        Annual Benefit
                    @elseif ($reportStatement_item['complimentary'] == 1 && $reportStatement_item['annual-benefit'] == 0 && $reportStatement_item['transfer'] == 0)
                        Complimentary
                    @elseif ($reportStatement_item['transfer'] == 1 && $reportStatement_item['annual-benefit'] == 0 && $reportStatement_item['complimentary'] == 0)
                        Transfer
                    @else
                        -
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@php
    $countStatement = $reportStatements->count();
    $summaryShares = $reportStatements
        ->filter(fn($item) => $item['type'] === 'Investment')
        ->sum('shares');
    $summarySales = $reportStatements
        ->filter(fn($item) => $item['type'] === 'Sale')
        ->sum('shares');
    $totalShare = $summaryShares - $summarySales;

    $summaryInvestmentValue = $reportStatements
        ->filter(fn($item) => $item['type'] === 'Investment')
        ->map(function($item) {
            return ($item['price'] * $item['shares']);
        })
        ->sum();
    $summarySaleValue = $reportStatements
        ->filter(fn($item) => $item['type'] === 'Sale')
        ->map(function($item) {
            return ($item['price'] * $item['shares']);
        })
        ->sum();


    $totalInvestmentValue = $summaryInvestmentValue - $summarySaleValue;

    $avgInvestmentValue = $reportStatements
        ->filter(fn($item) => $item['type'] === 'Investment')
        ->avg('price')  ;  

    $totalMarketValue = $totalShare * 3;

    $totalPayment = $reportStatements
        ->filter(fn($item) => $item['type'] === 'Payment')
        ->sum('price');
@endphp
<!-- Summary Section (คงเดิม) -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-2 mb-4 text-sm">
    <div><span class="font-bold text-gray-700">Number of shares:</span> <span class="text-[#db337f]">{{ number_format($totalShare, 2) ?? '0' }}</span></div>
    <div><span class="font-bold text-gray-700">Average price/share:</span> <span class="text-[#db337f]">${{ number_format($avgInvestmentValue, 4) ?? '0.00' }}</span></div>
    <div><span class="font-bold text-gray-700">Value of shares:</span> <span class="text-[#db337f]">${{ number_format($totalInvestmentValue, 2) ?? '0.00' }}</span></div>
    {{--<div><span class="font-bold text-gray-700">Market value:</span> <span class="text-[#db337f]">${{ number_format($totalMarketValue ?? 0, 2) }}</span></div>--}}
    <div><span class="font-bold text-gray-700">Cash Payments:</span> <span class="text-[#db337f]">${{ number_format($totalPayment ?? 0, 2) }}</span></div>
</div>
<a href="{{ route('statement.pdf', ['month' => request('month', date('Y-m'))]) }}" target="_blank" class="inline-flex items-ce2ter gap-2 px-4 py-2 bg-[#db337f] text-white rounded-lg hover:bg-[#b72c6a] transition">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 16v-8m0 8l-3-3m3 3l3-3"></path></svg>
    Download as PDF
</a>