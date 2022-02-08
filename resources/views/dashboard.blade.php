<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend\images\favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('backend\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend\css\icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend\css\app.min.css')}}" rel="stylesheet" type="text/css">

    <!-- BS3 -->

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        @include('admin.pages.header')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.pages.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            @yield('content')



            <!-- Footer Start -->
            @include('admin.pages.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close"></i>
            </a>
            <h5 class="m-0 text-white">Settings</h5>
        </div>
        <div class="slimscroll-menu">
            <hr class="mt-0">
            <h5 class="pl-3">Basic Settings</h5>
            <hr class="mb-0">


            <div class="p-3">
                <div class="checkbox checkbox-primary mb-2">
                    <input id="checkbox1" type="checkbox" checked="">
                    <label for="checkbox1">
                        Notifications
                    </label>
                </div>
                <div class="checkbox checkbox-primary mb-2">
                    <input id="checkbox2" type="checkbox" checked="">
                    <label for="checkbox2">
                        API Access
                    </label>
                </div>
                <div class="checkbox checkbox-primary mb-2">
                    <input id="checkbox3" type="checkbox">
                    <label for="checkbox3">
                        Auto Updates
                    </label>
                </div>
                <div class="checkbox checkbox-primary mb-2">
                    <input id="checkbox4" type="checkbox" checked="">
                    <label for="checkbox4">
                        Online Status
                    </label>
                </div>
                <div class="checkbox checkbox-primary mb-0">
                    <input id="checkbox5" type="checkbox" checked="">
                    <label for="checkbox5">
                        Auto Payout
                    </label>
                </div>
            </div>

            <!-- Timeline -->
            <hr class="mt-0">
            <h5 class="pl-3 pr-3">Messages <span class="float-right badge badge-pill badge-danger">25</span></h5>
            <hr class="mb-0">
            <div class="p-3">
                <div class="inbox-widget">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets\images\users\avatar-1.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Chadengle</a></p>
                        <p class="inbox-item-text">Hey! there I'm available...</p>
                        <p class="inbox-item-date">13:40 PM</p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets\images\users\avatar-2.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Tomaslau</a></p>
                        <p class="inbox-item-text">I've finished it! See you so...</p>
                        <p class="inbox-item-date">13:34 PM</p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets\images\users\avatar-3.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Stillnotdavid</a></p>
                        <p class="inbox-item-text">This theme is awesome!</p>
                        <p class="inbox-item-date">13:17 PM</p>
                    </div>

                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets\images\users\avatar-4.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Kurafire</a></p>
                        <p class="inbox-item-text">Nice to meet you</p>
                        <p class="inbox-item-date">12:20 PM</p>

                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets\images\users\avatar-5.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Shahedk</a></p>
                        <p class="inbox-item-text">Hey! there I'm available...</p>
                        <p class="inbox-item-date">10:15 AM</p>

                    </div>
                </div> <!-- end inbox-widget -->
            </div> <!-- end .p-3-->

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="{{asset('backend\js\vendor.min.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{asset('backend\libs\chart-js\Chart.bundle.min.js')}}"></script>

    <!-- Sparkline charts -->
    <script src="{{asset('backend\libs\jquery-sparkline\jquery.sparkline.min.js')}}"></script>

    <!-- Dashboard js -->
    <script src="{{asset('backend\js\pages\dashboard.init.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('backend\js\app.min.js')}}"></script>

    @stack('scrip')

</body>

</html>