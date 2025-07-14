@extends('backend.layouts.master')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Dashboard</h3>
{{--                    <h6 class="op-7 mb-2">Free Bootstrap 5 Admin Dashboard</h6>--}}
                </div>
            </div>
            <div class="row">
                @role('super_admin')
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Customers</p>
                                        <h4 class="card-title">{{$customerCount ?? ''}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    @can('dashboard.total-customer')
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Customers</p>
                                                <h4 class="card-title">{{$customerCount ?? ''}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endcan
                @endrole

                        @role('super_admin')
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                                <i class="fas fa-user-check"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Directors</p>
                                                <h4 class="card-title">{{$directorCount ?? ''}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            @can('dashboard.total-director')
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                                        <i class="fas fa-user-check"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ms-3 ms-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">Directors</p>
                                                        <h4 class="card-title">{{$directorCount ?? ''}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                            @endrole

                                @role('super_admin')
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                                        <i class="fas fa-luggage-cart"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ms-3 ms-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">Schemes</p>
                                                        <h4 class="card-title">{{$packageCount ?? ''}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    @can('dashboard.total-package')
                                        <div class="col-sm-6 col-md-3">
                                            <div class="card card-stats card-round">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-icon">
                                                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                                                <i class="fas fa-luggage-cart"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col col-stats ms-3 ms-sm-0">
                                                            <div class="numbers">
                                                                <p class="card-category">Schemes</p>
                                                                <h4 class="card-title">{{$packageCount ?? ''}}</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan
                                    @endrole

                                        @role('super_admin')
                                        <div class="col-sm-6 col-md-3">
                                            <div class="card card-stats card-round">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-icon">
                                                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                                                <i class="far fa-check-circle"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col col-stats ms-3 ms-sm-0">
                                                            <div class="numbers">
                                                                <p class="card-category">Membership Account</p>
                                                                <h4 class="card-title">{{$membershipCount ?? ''}}</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                            @can('dashboard.total-membership-account')
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="card card-stats card-round">
                                                        <div class="card-body">
                                                            <div class="row align-items-center">
                                                                <div class="col-icon">
                                                                    <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                                                        <i class="far fa-check-circle"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="col col-stats ms-3 ms-sm-0">
                                                                    <div class="numbers">
                                                                        <p class="card-category">Membership Account</p>
                                                                        <h4 class="card-title">{{$membershipCount ?? ''}}</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endcan
                                            @endrole


            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-round">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">User Statistics</div>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                                        <span class="btn-label">
                                            <i class="fa fa-pencil"></i>
                                        </span>
                                        Export
                                    </a>
                                    <a href="#" class="btn btn-label-info btn-round btn-sm">
                                        <span class="btn-label">
                                            <i class="fa fa-print"></i>
                                        </span>
                                        Print
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container" style="min-height: 375px">
                                <canvas id="statisticsChart"></canvas>
                            </div>
                            <div id="myChartLegend"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary card-round">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Todays Collection</div>
                            </div>
                            <div class="card-category">{{ \Illuminate\Support\Carbon::today()->format('M d, Y') }}</div>

                        </div>
                        <div class="card-body pb-0">
                            <div class="mb-4 mt-2">
                                <h1>{{ $todayCollection ?? '' }}Tk</h1>
                            </div>
                            <div class="pull-in">
                                <canvas id="dailySalesChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card card-round">
                        <div class="card-body pb-0">
                            <div class="h1 fw-bold float-end text-primary">{{ $percentage ?? '' }}%</div>
                            <h2 class="mb-2">{{ $activeMembers ?? '' }}</h2>
                            <p class="text-muted">Active Members</p>
                            <div class="pull-in sparkline-fix">
                                <div id="lineChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-round h-100">
                        <div class="card-body">
                            <div class="card-head-row card-tools-still-right">
                                <div class="card-title">New Clients</div>
                            </div>
                            <div class="card-list py-4">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-round h-100">
                        <div class="card-header">
                            <div class="card-head-row card-tools-still-right">
                                <div class="card-title">Subscription Fee Ledger</div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <!-- Projects table -->
                                <table class="table align-items-center mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Account No.</th>
                                            <th scope="col">Account Name</th>
                                            <th scope="col">Date & Time</th>
                                            <th scope="col">Last Month</th>
                                            <th scope="col">Amount</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
