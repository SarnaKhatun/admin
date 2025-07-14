<!DOCTYPE html>
<html>

<head>
    <title>Member Account Statement PDF</title>
    <style>
        p {
            margin: 0;
        }

        h4.client_statement {
            position: relative;
        }

        h4.client_statement::after {
            position: absolute;
            content: '';
            background: #000;
            left: 50%;
            top: 100%;
            width: 400px;
            height: 2px;
            transform: translateX(-50%);
        }

        table.display.table.table-striped.table-hover thead tr th {
            background: #E2EFDA;
            padding: 10px !important;
        }

        table.display.table.table-striped.table-hover thead,
        table.display.table.table-striped.table-hover tfoot tr {
            border-bottom: 2px solid #000;
            border-top: 2px solid #000;
        }
    </style>
</head>

<body>
    <h2>Client Statement (Page {{ $memberStatements->currentPage() }})</h2>
    <div class="table-responsive">
        <div class="text-center mb-2" style="margin-left: 100px">
            <div class="d-flex gap-5 align-items-center justify-content-center">
                <img src="{{ public_path('/backend/images/Logo.png') }}" alt="nominee_image" class="nominy_photo"
                    width=80px">
                <h2 class="text-center m-0" style="color: #00B050;font-weight: bold">DFL Bahumukhi Shomobay Shomity Ltd.
                </h2>
            </div>
            {{--        <h2 class="text-center" style="color: #00B050;font-weight: bold">DFL Bahumukhi Shomobay Shomity Ltd.</h2> --}}
            <small>67/1, Naya Palton, Palton China Town (16th floor), Dhaka-1000</small>
            <h4 class="client_statement" style="margin-left: 180px"><b>Client Statement</b></h4>
        </div>

        <div style="; margin-left: 30px;">
            <div class="">
                <div class="d-flex">
                    <span><b>Account Name</b></span>
                    <span>: {{ $client->name ?? '' }}</span>
                </div>
                <div class="d-flex">
                    <span><b>Client ID</b></span>
                    <span>: {{ $client->client_number ?? '' }}</span>
                </div>
                <div class="d-flex">
                    <span><b>Account Opening Date</b></span>
                    <span>: {{ $client->date ? \Carbon\Carbon::parse($client->date)->format('d-m-Y') : '' }}</span>
                </div>
                <div class="d-flex">
                    <span><b>Mobile Number</b></span>
                    <span>: {{ $client->mobile_number ?? '' }}</span>
                </div>
                <div class="d-flex">
                    <span><b>Address</b></span>
                    <span>: {{ $client->present_address_en ?? '' }}</span>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="text-end">
        <small style="margin-left: 400px">Report taken on {{ $report_taken_time }}</small>
    </div>

    <br><br>
    <table class="display table table-striped table-hover">
        <thead>
        <tr>
            <th>Date</th>
            <th>Particulars</th>
            <th>Receipt No.</th>
            <th>Deposit</th>
            <th>Withdraw</th>
            <th>Balance</th>
        </tr>
        </thead>
        <tbody>

        @php

            $combinedStatements = collect($combinedStatements ?? []);

            $openingBalance = $combinedStatements->firstWhere('particular', 'Opening Balance');
            $otherStatements = $combinedStatements->where('particular', '!=', 'Opening Balance');

            $combinedStatements = collect([$openingBalance])->filter()->merge($otherStatements);
        @endphp


        @foreach ($combinedStatements as $index => $statement)
            @if ($statement)
                <tr>
                    <td>{{ $statement['date'] ?? 'N/A' }}</td>
                    <td>
                        @if ($statement['particular'] === 'Opening Balance')
                            <b>{{ $statement['particular'] }}</b>
                        @else
                            {{ $statement['particular'] }}
                        @endif
                    </td>
                    <td>{{ $statement['receipt_number'] ?? 'N/A' }}</td>
                    <td>{{ isset($statement['deposit']) && $statement['deposit'] > 0 ? number_format($statement['deposit'], 2) : '-' }}</td>
                    <td>{{ isset($statement['withdraw']) && $statement['withdraw'] > 0 ? number_format($statement['withdraw'], 2) : '-' }}</td>
                    <td>{{ isset($statement['balance']) ? number_format($statement['balance'], 2) : 'N/A' }}</td>
                </tr>
            @endif
        @endforeach
        </tbody>

        <tfoot>
        <tr>
            <th colspan="5" class="text-end font-bold">Total</th>
            <th>{{ isset($cumulativeBalance) ? number_format($cumulativeBalance, 2) : 'N/A' }}</th>
        </tr>
        </tfoot>
    </table>
</body>

</html>
