@extends('backend.layouts.master')

@section('content')
    <style>
        p {
            margin: 0;
        }

        table.table.table-striped.table-bordered thead tr th {
            background: #E2EFDA;
            padding: 10px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 2px solid #ebedf2;
        }

        .select2-container .select2-selection--single {
            height: 40px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            top: 70%;
        }

        table.table.table-striped.table-bordered thead tr {
            border-bottom: 2px solid #000;
            border-top: 2px solid #000;
        }

        .select2-container--default .select2-selection--single .select2-selection__clear {
            height: 37px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 35px;
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
                                    @role('super_admin')
                                        <a href="{{ route('clients.statement-all') }}" class="btn btn-primary btn-sm">Back</a>
                                    @else
                                        @can('membership-account.list')
                                            <a href="{{ route('clients.statement-all') }}" class="btn btn-primary btn-sm">Back</a>
                                        @endcan
                                    @endrole

                                    <button class="btn btn-primary btn-sm" style="background: #5969ff"
                                        onclick="directorAnalysisFunction('analysis_report_print')">
                                        <i class="fa fa-print"></i> Print Statement
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 row">
                            <div class="mx-auto col-md-5 offset-md--1 col-10">
                                <select name="client_name" id="client_name" class="form-control js-example-templating">
                                    <option value="" selected>Select a Client</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->name }}">
                                            {{ $client->name }}({{ $client->client_number }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mx-auto col-10 col-md-5 d-flex align-items-center mobile_check">
                                <input type="text" name="date_range" id="daterange" class="form-control ms-2"
                                    placeholder="Select Date Range"
                                    value="{{ request('start_date') && request('end_date') ? request('start_date') . ' - ' . request('end_date') : '' }}">
                                <button id="filter" style="margin-left: 10px"
                                    class="btn btn-form btn-primary d-flex align-items-center"><i
                                        class="fas fa-search me-2"></i>Search
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div id="analysis_report_print">
                                <div class="table-responsive">
                                    <div class="mb-2 text-center">
                                        <div class="gap-5 d-flex align-items-center justify-content-center">
                                            <img src="{{ asset('/backend/images/Logo.png') }}" alt="nominee_image"
                                                class="nominy_photo" width="50px">
                                            <h2 class="m-0 text-center" style="color: #00B050;font-weight: bold">DFL
                                                Bahumukhi Shomobay Shomity Ltd.</h2>
                                        </div>
                                        <small>67/1, Naya Palton, Palton China Town (16th floor), Dhaka-1000</small>
                                        @if (request()->filled('client_name') && request()->filled(['start_date', 'end_date']))
                                            <h4 class="client_statement"><b>This Client Statement</b></h4>
                                        @else
                                            <h4 class="client_statement"><b>All Statement</b></h4>
                                        @endif
                                    </div>

                                    @if (request()->filled('client_name') && request()->filled(['start_date', 'end_date']))
                                        <div style="max-width: 700px; margin-left: 30px;">
                                            <ul class="client_list">
                                                <li class="d-flex">
                                                    <p><b>Account Name</b></p>
                                                    <p><b>: {{ $client1->name ?? '' }}</b></p>
                                                </li>
                                                <li class="d-flex">
                                                    <p><b>Client ID</b></p>
                                                    <p><b>: {{ $client1->client_number ?? '' }}</b></p>
                                                </li>
                                                <li class="d-flex">
                                                    <p><b>Account Opening Date</b></p>
                                                    <p>: {{ $client1->date ? \Carbon\Carbon::parse($client->date)->format('d-m-Y') : '' }}
                                                    </p>
                                                </li>
                                                <li class="d-flex">
                                                    <p><b>Mobile Number</b></p>
                                                    <p>: {{ $client1->mobile_number ?? '' }}</p>
                                                </li>
                                                <li class="d-flex">
                                                    <p><b>Address</b></p>
                                                    <p>: {{ $client1->present_address_en ?? '' }}</p>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif

                                </div>
                                <div class="text-end">
                                    <small>Report taken on {{ $report_taken_time }}</small>
                                </div>
                                <div class="table-responsive">
                                    @if (request()->filled('client_name') && request()->filled(['start_date', 'end_date']))
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Particulars</th>
                                                    <th>Receipt Number</th>
                                                    <th>Deposit</th>
                                                    <th>Withdraw</th>
                                                    <th>Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>



                                                @foreach ($paginatedCombinedStatements as $statement)
                                                    <tr>
                                                        <td>{{ $statement['date'] }}</td>
                                                        <td>
                                                            @if ($statement['particular'] === 'Opening Balance')
                                                                <b>{{ $statement['particular'] }}</b>
                                                            @else
                                                                {{ $statement['particular'] }}
                                                            @endif
                                                        </td>
                                                        <td>{{ $statement['receipt_number'] }}</td>
                                                        <td>{{ $statement['deposit'] }}</td>
                                                        <td>{{ $statement['withdraw'] }}</td>
                                                        <td>{{ $statement['balance'] }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5" class="text-end">Total</th>
                                                    <th>{{ $cumulativeBalance }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        {{ $paginatedCombinedStatements->links() }}
                                    @else
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
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
                                                        <td>{{ \Carbon\Carbon::parse($statement->date)->format('d-m-Y') }}
                                                        </td>
                                                        <td>{{ $statement->particular }}</td>
                                                        <td>{{ $statement->receipt_number ?? 'N/A' }}</td>
                                                        <td>{{ $statement->deposit }}</td>
                                                        <td>{{ $statement->withdraw }}</td>
                                                        <td>{{ $statement->balance }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $memberStatements->links() }}
                                    @endif

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
        $(".js-example-templating").select2({
            placeholder: "Select",
            allowClear: true
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

    <script>
        $('#daterange').daterangepicker({
            opens: 'left',
            locale: {
                format: 'DD/MM/YYYY'
            }
        });

        $('#filter').click(function() {
            var clientName = $('#client_name').val();
            var dateRange = $('#daterange').val().split(' - ');
            var startDate = dateRange[0];
            var endDate = dateRange[1];

            window.location.href = "{{ route('clients.statement-all') }}?start_date=" + startDate + "&end_date=" +
                endDate + "&client_name=" + clientName;
        });
    </script>
@endpush
