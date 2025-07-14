@extends('backend.layouts.master')
@section('content')
    <style>
        p {
            margin: 0;
        }

        ul.client_list {
            margin: 0;
            padding: 0;
        }

        ul.client_list li p:first-child {
            width: 200px;
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
    <div class="container" style="max-width: 1200px">
        <div class="page-inner">
            <div class="page-header">
                <ul class="mb-3 breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Forms</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="pb-0 d-flex align-items-left align-items-md-center flex-column flex-md-row pt-">
                                <div class="py-0 ms-md-auto py-md-0">
                                    <a href="{{ route('clients.index') }}" class="btn btn-primary btn-sm">Back</a>
                                    <button class="btn btn-primary btn-sm" style="background: #5969ff"
                                        onclick="directorAnalysisFunction('analysis_report_print')">
                                        <i class="fa fa-print"></i> Print Statement
                                    </button>
                                    <a href="{{ route('clients.all-statement.pdf', $client->id) }}"
                                        class="btn btn-info btn-sm">Download PDF</a>

                                    <a href="{{ route('clients.single-page.all-statement.pdf', ['id' => $client->id, 'page' => $memberStatements->currentPage()]) }}"
                                        class="btn btn-primary btn-sm">Download PDF (Current Page)</a>

                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6 offset-md-1 d-flex">
                                <input type="text" name="date_range" id="daterange" class="form-control"
                                    placeholder="Select Date Range">
                                <button id="filter" class="btn btn-form btn-primary d-flex align-items-center"><i
                                        class="fas fa-search me-2"></i>Search
                                </button>
                            </div>
                        </div>
                        <div id="analysis_report_print">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="mb-2 text-center">
                                        <div class="gap-5 d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('/backend/images/Logo.png') }}" alt="nominee_image"
                                                class="nominy_photo" width=50px">
                                            <h2 class="m-0 text-center" style="color: #00B050;font-weight: bold">DFL
                                                Bahumukhi Shomobay Shomity Ltd.</h2>
                                        </div>
                                        <small>67/1, Naya Palton, Palton China Town (16th floor), Dhaka-1000</small>
                                        <h4 class="client_statement"><b>Client Statement</b></h4>
                                        <p>for the period of {{ $start_date }} to {{ $end_date }}</p>
                                    </div>

                                    <div style="max-width: 700px; margin-left: 30px;">
                                        <ul class="client_list">
                                            <li class="d-flex">
                                                <p><b>Account Name</b></p>
                                                <p><b>: {{ $client->name ?? '' }}</b></p>
                                            </li>
                                            <li class="d-flex">
                                                <p><b>Client ID</b></p>
                                                <p><b>: {{ $client->client_number ?? '' }}</b></p>
                                            </li>
                                            <li class="d-flex">
                                                <p><b>Account Opening Date</b></p>
                                                <p>: {{ $client->date ? \Carbon\Carbon::parse($client->date)->format('d-m-Y') : '' }}
                                                </p>
                                            </li>
                                            <li class="d-flex">
                                                <p><b>Mobile Number</b></p>
                                                <p>: {{ $client->mobile_number ?? '' }}</p>
                                            </li>
                                            <li class="d-flex">
                                                <p><b>Address</b></p>
                                                <p>: {{ $client->present_address_en ?? '' }}</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <br><br>
                                <div class="text-end">
                                    <small>Report taken on {{ $report_taken_time }}</small>
                                </div>
                                <div class="table-responsive">
                                    <table class="table display table-striped table-hover">
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

                                                $openingBalance = $combinedStatements->firstWhere(
                                                    'particular',
                                                    'Opening Balance',
                                                );
                                                $otherStatements = $combinedStatements->where(
                                                    'particular',
                                                    '!=',
                                                    'Opening Balance',
                                                );

                                                $combinedStatements = collect([$openingBalance])
                                                    ->filter()
                                                    ->merge($otherStatements);
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
                                                        <td>{{ isset($statement['deposit']) && $statement['deposit'] > 0 ? number_format($statement['deposit'], 2) : '-' }}
                                                        </td>
                                                        <td>{{ isset($statement['withdraw']) && $statement['withdraw'] > 0 ? number_format($statement['withdraw'], 2) : '-' }}
                                                        </td>
                                                        <td>{{ isset($statement['balance']) ? number_format($statement['balance'], 2) : 'N/A' }}
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th colspan="5" class="font-bold text-end">Total</th>
                                                <th>{{ isset($cumulativeBalance) ? number_format($cumulativeBalance, 2) : 'N/A' }}
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    {{ $memberStatements->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#daterange').daterangepicker({
            opens: 'left',
            locale: {
                format: 'DD/MM/YYYY'
            }
        });

        $('#filter').click(function() {
            var dateRange = $('#daterange').val().split(' - ');
            var startDate = dateRange[0];

            var endDate = dateRange[1];
            console.log(dateRange);
            console.log(startDate);
            console.log(endDate);
            window.location.href = "{{ route('clients.all-statement', $client->id) }}?start_date=" + startDate +
                "&end_date=" + endDate;
        });
    </script>
    <script>
        function directorAnalysisFunction(el) {
            let restorepage = document.body.innerHTML;
            let printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
            location.reload()
        }
    </script>
@endpush
