<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Statement PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; padding-bottom: 60px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 0px; }
        th, td { padding: 6px; text-align: left; }
        th { background: #eee; }
        .pagenum:before { content: counter(page); }
    </style>
</head>
<body>
    <table border="0" style="width:100%; margin-bottom:20px;">
        <tr>
            <td style="width: 50%"><img src="{{ public_path('images/FMH_Brandmark_TRANSPARENT-300x300.png') }}" alt="Logo" style="width:100px; height:auto;"></td>
            <td style="width: 15%"></td>
            <td style="width: 35%">FAH MAI HOLDINGS GROUP, INC.<BR>No. 4 Davis Way, Fareham, Hampshire,<BR>UK +44 (0) 20 4552 4713<BR>admin@fahmaiholdings.com<BR>www.fahmaiholdings.com</td>
            
        </tr>
        
        
        <tr>
        	<td></td>
            <td colspan=2><strong>Date: {{ date('d/m/y') }}</strong></td>
        </tr>
        <tr>
            <td>Re : Account Statement</td>
        </tr>

        <tr>
            <td>
                <strong>Attn: {{ auth()->user()->name }}</strong>
                @if(auth()->user()->street_address)
                    <BR>{{ auth()->user()->street_address }}
                @endif
                @if(auth()->user()->street_address_2)
                    <BR>{{ auth()->user()->street_address_2 }}
                @endif
                @if(auth()->user()->town || auth()->user()->county || auth()->user()->postcode || auth()->user()->country)
                    <BR>
                    {{ auth()->user()->town }}@if(auth()->user()->town && auth()->user()->county), @endif{{ auth()->user()->county }}@if(auth()->user()->county && auth()->user()->postcode), @endif{{ auth()->user()->postcode }}@if(auth()->user()->postcode && auth()->user()->country), @endif{{ auth()->user()->country }}
                @endif
                @if(auth()->user()->email)
                    <BR>{{ auth()->user()->email }}
                @endif
                @if(auth()->user()->phone)
                    <BR>{{ auth()->user()->phone }}
                @endif
            </td>
        </tr>
        
    </table>
    
    <table class="min-w-full text-left mb-4 ">
        <thead>
            <tr>
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
                <tr>
                    <td>{{ $reportStatement_item['date'] }}</td>
                    <td>{{ $reportStatement_item['type'] }}</td>
                    <td>
                        @if($reportStatement_item['type'] == 'Investment')
                            {{ number_format($reportStatement_item['shares'], 2) }} shares
                        @elseif($reportStatement_item['type'] == 'Sale')
                            -{{ number_format($reportStatement_item['shares'], 2) }} shares
                        @endif
                    </td>
                    <td>
                        @if($reportStatement_item['type'] == 'Investment' || $reportStatement_item['type'] == 'Sale')
                            ${{ number_format($reportStatement_item['price'], 4) }}
                        @else
                            {{-- Payment --}}
                        @endif
                    </td>
                    <td>
                        @if($reportStatement_item['type'] == 'Investment')
                            ${{ number_format($reportStatement_item['price'] * $reportStatement_item['shares'], 2) }}
                        @elseif($reportStatement_item['type'] == 'Sale')
                            -${{ number_format($reportStatement_item['price'] * $reportStatement_item['shares'], 2) }}
                        @elseif($reportStatement_item['type'] == 'Payment')
                            ${{ number_format($reportStatement_item['price'], 2) }}
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
            ->avg('price') ;  

        $totalMarketValue = $totalShare * 3;

        $totalPayment = $reportStatements
            ->filter(fn($item) => $item['type'] === 'Payment')
            ->sum('price');
    @endphp
    <!-- Summary Section (คงเดิม) -->
    <h3>Summary</h3>
    <table style="width:50%; margin-top:20px;">
        <tr>
            <td><strong>Number of shares:</strong></td>
            <td>{{ number_format($totalShare, 2) ?? '0' }}</td>
        </tr>
        <tr>
            <td><strong>Average price/share:</strong></td>
            <td>${{ number_format($avgInvestmentValue, 4) ?? '0.00' }}</td>
        </tr>
        <tr>
            <td><strong>Value of shares:</strong></td>
            <td>${{ number_format($totalInvestmentValue, 2) ?? '0.00' }}</td>
        </tr>
        {{--<tr>
            <td><strong>Market value:</strong></td>
            <td>${{ number_format($totalMarketValue ?? 0, 2) }}</td>
        </tr>--}}
        <tr>
            <td><strong>Cash Payments:</strong></td>
            <td>${{ number_format($totalPayment ?? 0, 2) }}</td>
        </tr>
    </table>
    
    <!-- FOOTER -->
    <div style="position: fixed; left: 0; bottom: 0; width: 100%; font-size: 10px; color: #888;">
        <table style="width:100%;">
            <tr>
                <td style="text-align:left; vertical-align:bottom;">
                    <img src="{{ public_path('images/FMH_Brandmark_TRANSPARENT-300x300.png') }}" alt="Logo" style="width:100px; height:auto; opacity: 50%;">
                </td>
                <td style="text-align:right; vertical-align:bottom;">
                    Fah Mai Holdings © {{ date('Y') }} | Page <span class="pagenum"></span>
                </td>
            </tr>
        </table>
    </div>
    <!-- /FOOTER -->

</body>
</html>