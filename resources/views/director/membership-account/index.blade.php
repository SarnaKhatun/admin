@extends('director.layouts.master')
@section('content')
    <style>
        td.table>tbody>tr>td,
        .table>tbody>tr>th {
            padding: 5px !important;
        }

    </style>
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Membership Accounts</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt- pb-0">
                                <div class="card-title">Membership Accounts</div>
                                <div class="ms-md-auto py-0 py-md-0">

                                    <a href="{{ route('director.member-account.pdf') }}" class="btn btn-info btn-sm">Download
                                        PDF</a>

                                    <a href="{{ route('director.membership.single-page-download.pdf') }}" id="download_pdf"
                                       class="btn btn-info btn-sm">Single Page Download PDF</a>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 d-flex">
                                    <input type="text" id="search_items" class="form-control"
                                           placeholder="Search with Client, Director, Scheme, Account Name, Account No., Mobile Number">
                                    <button id="member_items" class="btn-sm btn btn-primary d-flex align-items-center">
                                        <i class="fas fa-search me-2"></i> Search
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="" class="display table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Account No</th>
                                        <th>Account Name</th>
                                        <th>Reference(director)</th>
                                        <th>Mobile Number</th>
                                        <th>Scheme</th>
                                        <th>Balance</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if ($membershipAccounts->isEmpty())
                                        <tr>
                                            <td colspan="9" class="text-center">No data found</td>
                                        </tr>
                                    @else
                                        @foreach ($membershipAccounts as $row)
                                            @php
                                            $statement_id = \App\Models\MemberAccountStatement::where('membership_account_id', $row->id)->latest()->first();
                                            $balance = $statement_id->balance ?? "0.00";
                                            @endphp
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->account_number ?? '' }}</td>
                                                <td>
                                                    <a href="{{ route('director.monthly-subscription-fees.show', $row->id) }}"> {{ $row->name ?? '' }}</a>
                                                </td>
                                                <td>{{ $row->director->name ?? '' }}</td>
                                                <td>{{ $row->customer->mobile_number ?? '' }}</td>
                                                <td>{{ $row->package->name ?? '' }}</td>
                                                <td>{{ $balance ?? '' }}</td>
                                                <td style="width: 200px" class="najmul">

                                                    <a href="{{ route('director.membership-account.view', $row->id) }}"
                                                       class="btn btn-sm btn-info">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('director.member-account-statement.view', $row->id) }}"
                                                       class="btn btn-sm btn-warning">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                {!! $membershipAccounts->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#member_items').click(function(e) {
                e.preventDefault();
                var searchItems = $('#search_items').val();
                window.location.href = "{{ route('director.membership-account') }}?search_items=" +
                    searchItems;
            });

            $('#download_pdf').click(function(e) {
                e.preventDefault();
                var currentPage = {{ request()->input('page', 1) }};

                var pdfDownloadUrl = "{{ route('director.membership.single-page-download.pdf') }}";

                pdfDownloadUrl += "?page=" + currentPage;
                window.location.href = pdfDownloadUrl;
            });
        });
    </script>
@endpush

