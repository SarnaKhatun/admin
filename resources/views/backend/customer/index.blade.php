@extends('backend.layouts.master')
@section('content')
    <style>

        @media only screen and (max-width: 600px) {


            .client {
                flex-direction: column
            }
        }
        table.display.table.table-striped.table-hover thead tr th {
            background: #E2EFDA;
            padding: 10px !important;
            border-top: 2px solid #000 !important;
            border-bottom: 2px solid #000 !important;
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
                        <a href="#">Clients</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between client">
                                <div class="card-title">Client List</div>
{{--                                <div class="ms-md-auto py-0 py-md-0 d-flex flex-row gap-2  flex-wrap">--}}
                                <div class="ms-md-auto py-0 py-md-0">
                                    @role('super_admin')
                                        <a href="{{ route('clients.create') }}" class="btn btn-primary btn-sm">Add New</a>
                                    @else
                                        @can('client.create')
                                            <a href="{{ route('clients.create') }}" class="btn btn-primary btn-sm">Add
                                                New</a>
                                        @endcan
                                    @endrole
                                    @role('super_admin')
                                            <a href="{{ route('customer-download.pdf') }}" class="btn btn-info btn-sm">Download
                                                PDF</a>
                                    @else
                                        @can('client.pdf')
                                            <a href="{{ route('customer-download.pdf') }}" class="btn btn-info btn-sm">Download
                                                PDF</a>
                                        @endcan
                                    @endrole
                                    <a href="{{ route('exportclient') }}" class="btn btn-primary btn-sm">Export</a>
                                    <a href="{{ route('client.single-page-download.pdf') }}" id="download_pdf"
                                        class="btn btn-info btn-sm">Single Page Download PDF</a>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6 d-flex">
                                    <input type="text" id="search_items" class="form-control"
                                        placeholder="Search with Client Id, Name, Phone, NID Number">
                                    <button id="client_items" class="btn-sm btn btn-primary d-flex align-items-center">
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
                                            <th>Client ID</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>NID</th>
                                            <th>DOB</th>
                                            @role('super_admin')
                                                <th>Action</th>
                                            @else
                                                @canany(['client.edit', 'client.delete'])
                                                    <th>Action</th>
                                                @endcanany
                                            @endrole
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($customers as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->client_number }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->mobile_number }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->nid_number }}</td>
                                                <td>{{ $row->dob ? \Carbon\Carbon::parse($row->dob)->format('d-m-Y') : '' }}
                                                </td>
                                                @role('super_admin')
                                                    <td>
                                                        <a href="{{ route('clients.show', $row->id) }}"
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('clients.all-statement', $row->id) }}"
                                                           class="btn btn-sm btn-warning">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                        @role('super_admin')
                                                            <a href="{{ route('clients.edit', $row->id) }}"
                                                                class="btn btn-sm btn-primary">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                        @else
                                                            @can('client.edit')
                                                                <a href="{{ route('clients.edit', $row->id) }}"
                                                                    class="btn btn-sm btn-primary">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                            @endcan
                                                        @endrole

{{--                                                        @role('super_admin')--}}
{{--                                                            <form action="{{ route('clients.destroy', $row->id) }}" method="POST"--}}
{{--                                                                style="display:inline;">--}}
{{--                                                                @csrf--}}
{{--                                                                @method('DELETE')--}}
{{--                                                                <button type="submit" class="btn btn-sm btn-danger"--}}
{{--                                                                    onclick="return confirm('Are you sure you want to delete this client?');">--}}
{{--                                                                    <i class="fa fa-trash"></i>--}}
{{--                                                                </button>--}}
{{--                                                            </form>--}}
{{--                                                        @else--}}
{{--                                                            @can('client.delete')--}}
{{--                                                                <form action="{{ route('clients.destroy', $row->id) }}" method="POST"--}}
{{--                                                                    style="display:inline;">--}}
{{--                                                                    @csrf--}}
{{--                                                                    @method('DELETE')--}}
{{--                                                                    <button type="submit" class="btn btn-sm btn-danger"--}}
{{--                                                                        onclick="return confirm('Are you sure you want to delete this customer?');">--}}
{{--                                                                        <i class="fa fa-trash"></i>--}}
{{--                                                                    </button>--}}
{{--                                                                </form>--}}
{{--                                                            @endcan--}}
{{--                                                        @endrole--}}

                                                    </td>
                                                @else
                                                    @canany(['client.edit', 'client.delete'])
                                                        <td>
                                                            <a href="{{ route('clients.show', $row->id) }}"
                                                               class="btn btn-sm btn-primary">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a href="{{ route('clients.all-statement', $row->id) }}"
                                                               class="btn btn-sm btn-warning">
                                                                <i class="fa fa-plus"></i>
                                                            </a>
                                                            @role('super_admin')
                                                                <a href="{{ route('clients.edit', $row->id) }}"
                                                                    class="btn btn-sm btn-primary">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                            @else
                                                                @can('client.edit')
                                                                    <a href="{{ route('clients.edit', $row->id) }}"
                                                                        class="btn btn-sm btn-primary">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                @endcan
                                                            @endrole
{{--                                                            @role('super_admin')--}}
{{--                                                                <form action="{{ route('clients.destroy', $row->id) }}" method="POST"--}}
{{--                                                                    style="display:inline;">--}}
{{--                                                                    @csrf--}}
{{--                                                                    @method('DELETE')--}}
{{--                                                                    <button type="submit" class="btn btn-sm btn-danger"--}}
{{--                                                                        onclick="return confirm('Are you sure you want to delete this customer?');">--}}
{{--                                                                        <i class="fa fa-trash"></i>--}}
{{--                                                                    </button>--}}
{{--                                                                </form>--}}
{{--                                                            @else--}}
{{--                                                                @can('client.delete')--}}
{{--                                                                    <form action="{{ route('clients.destroy', $row->id) }}" method="POST"--}}
{{--                                                                        style="display:inline;">--}}
{{--                                                                        @csrf--}}
{{--                                                                        @method('DELETE')--}}
{{--                                                                        <button type="submit" class="btn btn-sm btn-danger"--}}
{{--                                                                            onclick="return confirm('Are you sure you want to delete this customer?');">--}}
{{--                                                                            <i class="fa fa-trash"></i>--}}
{{--                                                                        </button>--}}
{{--                                                                    </form>--}}
{{--                                                                @endcan--}}
{{--                                                            @endrole--}}

                                                        </td>
                                                    @endcanany
                                                @endrole
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $customers->links() }}
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
            $('#client_items').click(function(e) {
                e.preventDefault();
                var searchItems = $('#search_items').val();
                window.location.href = "{{ route('clients.index') }}?search_items=" + searchItems;
            });

            $('#download_pdf').click(function(e) {
                e.preventDefault();
                var currentPage = {{ request()->input('page', 1) }};

                var pdfDownloadUrl = "{{ route('client.single-page-download.pdf') }}";

                pdfDownloadUrl += "?page=" + currentPage;
                window.location.href = pdfDownloadUrl;
            });
        });
    </script>
@endpush
