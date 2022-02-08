@extends('dashboard')
@section('title','Trang quản trị')
@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Simulor</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Trang chủ quản trị</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body p-0">
                        <div class="p-3 pb-0">
                            <div class="float-right">
                                <i class="mdi mdi-cart text-primary widget-icon"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0">Đơn hàng</h5>
                            <h3 class="mt-2"></h3>
                        </div>
                        <div id="sparkline1"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-xl-3 col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body p-0">
                        <div class="p-3 pb-0">
                            <div class="float-right">
                                <i class="mdi mdi-currency-usd text-danger widget-icon"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0">Tổng tiền</h5>
                            <h3 class="mt-2"></h3>
                        </div>
                        <div id="sparkline2"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-xl-3 col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body p-0">
                        <div class="p-3 pb-0">
                            <div class="float-right">
                                <i class="mdi mdi-account-multiple text-primary widget-icon"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0">Khách hàng</h5>
                            <h3 class="mt-2"></h3>
                        </div>
                        <div id="sparkline3"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-xl-3 col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body p-0">
                        <div class="p-3 pb-0">
                            <div class="float-right">
                                <i class="mdi mdi-eye-outline text-danger widget-icon"></i>
                            </div>
                            <h5 class="text-muted font-weight-normal mt-0">Sản phẩm</h5>
                            <h3 class="mt-2"></h3>
                        </div>
                        <div id="sparkline4"></div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Sales Analytics</h4>

                        <canvas id="bar" height="350" class="mt-4"></canvas>

                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Top Marketplaces</h4>

                        <canvas id="doughnut" height="350" class="mt-4"></canvas>

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->

</div>
@endsection