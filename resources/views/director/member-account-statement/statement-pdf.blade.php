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
            <h4 class="client_statement" style="margin-left: 180px"><b>Member Account Statement</b></h4>
        </div>
        <div style="; margin-left: 30px;">
            <div class="">
                <div class="d-flex">
                    <span><b>Account Name</b></span>
                    <span>: {{ $membershipAccount->name ?? '' }}</span>
                </div>
                <div class="d-flex">
                    <span><b>Reference Name</b></span>
                    <span>: {{ $membershipAccount->director->name ?? '' }}</span>
                </div>
                <div class="d-flex">
                    <span><b>Account no</b></span>
                    <span>: {{ $membershipAccount->account_number ?? '' }}</span>
                </div>
                <div class="d-flex">
                    <span><b>Scheme</b></span>
                    <span>: {{ $membershipAccount->package->name ?? '' }}</span>
                </div>
                <div class="d-flex">
                    <span><b>Account Opening Date</b></span>
                    <span>:
                        {{ $membershipAccount->date ? \Carbon\Carbon::parse($membershipAccount->date)->format('d-m-Y') : '' }}</span>
                </div>
                <div class="d-flex">
                    <span><b>Mobile Number</b></span>
                    <span>: {{ $membershipAccount->customer->mobile_number ?? '' }}</span>
                </div>
                <div class="d-flex">
                    <span><b>Address</b></span>
                    <span>: {{ $membershipAccount->customer->present_address_en ?? '' }}</span>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="text-end">
        <small style="margin-left: 400px">Report taken on {{ $report_taken_time }}</small>
    </div>

    <br><br>


    <table id="" class="display table table-striped table-hover">
        <thead>
            <tr>
                <th>Trans Date</th>
                <th>Particulars</th>
                <th>Receipt Number</th>
                <th>Deposit</th>
                <th>Withdraw</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($memberStatements as $statement)
                <tr>
                    <th>{{ $statement->date ?? 'Null' }}</th>
                    <th>{{ $statement->particular ?? 'Null' }}</th>
                    <th>{{ $statement->receipt_number ?? 'N/A' }}</th>
                    <th>{{ $statement->deposit == 0 ? '-' : $statement->deposit }}</th>
                    <th>{{ $statement->withdraw == 0 ? '-' : $statement->withdraw }}</th>
                    <th>{{ $statement->balance ?? 'Null' }}</th>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5" class="text-end font-bold">Total</th>
                <th colspan="">
                    @php
                        $finalBalance = $memberStatements->last() ? $memberStatements->last()->balance : 'N/A';
                    @endphp
                    {{ $finalBalance }}
                </th>
            </tr>
        </tfoot>
    </table>

</body>

</html>
