@extends('director.layouts.master')
@section('content')
    <style>
        @media only screen and (max-width: 600px) {
            .monthly_collection {
                flex-direction: column;
            }
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
                        <a href="#">Monthly Collection</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div
                                class="d-flex align-items-center gap-3 justify-content-between flex-col monthly_collection">
                                <div class="card-title">Monthly Collection</div>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('director.monthly-subscription.pdf') }}" class="btn btn-info btn-sm">Download PDF</a>
                                    <a href="{{ route('director.monthly-collection.single-page-download.pdf') }}" id="download_pdf" class="btn btn-info btn-sm">Single Page Download PDF</a>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-6 d-flex">
                                    <input type="text" id="search_items" class="form-control"
                                           placeholder="Search with Account Name, Account Number, Director Name">
                                    <button id="member_items" class="btn-sm btn btn-primary d-flex align-items-center">
                                        <i class="fas fa-search me-2"></i> Search
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Account Number</th>
                                        <th>Account Name</th>
                                        <th>Director Name</th>
                                        <th>Scheme</th>
                                        <th>Total Collection</th>
                                        <th>Action</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if ($monthlySubscriptionFees->isNotEmpty())
                                        @foreach ($monthlySubscriptionFees as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->membershipAccount->account_number ?? ''}}</td>
                                                <td>
                                                    <a
                                                        href="{{ route('director.monthly-subscription-fees.show', $row->id) }}">{{ $row->membershipAccount->customer->name ?? ''}}</a>
                                                </td>
                                                <td>{{ $row->membershipAccount->director->name ?? '' }}</td>
                                                <td>{{ $row->package->name }} - {{ $row->package->value }}</td>



                                                </td>
                                                <td>{{ $row->total_amount }}</td>

                                                <td>
                                                    <a href="{{ route('director.monthly-subscription-fees.show', $row->id) }}"
                                                       class="btn btn-sm btn-info">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('director.member-account-statement.view', $row->membershipAccount->id ?? '') }}"
                                                       class="btn btn-sm btn-warning">
                                                        <i class="fa fa-plus"></i>
                                                    </a>


                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                    @endif
                                    </tbody>
                                </table>
                                {{ $monthlySubscriptionFees->links() }}
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
                window.location.href = "{{ route('director.monthly-subscription-fees.index') }}?search_items=" +
                    searchItems;
            });

            $('#download_pdf').click(function(e) {
                e.preventDefault();
                var currentPage = {{ request()->input('page', 1) }};

                var pdfDownloadUrl = "{{ route('director.monthly-collection.single-page-download.pdf') }}";

                pdfDownloadUrl += "?page=" + currentPage;
                window.location.href = pdfDownloadUrl;
            });
        });
    </script>
@endpush

