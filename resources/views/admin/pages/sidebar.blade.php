<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- LOGO -->
        <a href="{{route('dashboard')}}" class="logo text-center mb-4">
            <span class="logo-lg">
                <img src="{{asset('backend\images\logo-dark.png')}}" alt="" height="20">
            </span>
            <span class="logo-sm">
                <img src="{{asset('backend\images\logo-sm.png')}}" alt="" height="24">
            </span>
        </a>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Tùy chọn</li>
                <li>
                    <a href="{{route('students.index')}}">
                        <i class="fe-hard-drive"></i>
                        <span> Danh sách học viên </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('cars.index')}}">
                        <i class="fe-hard-drive"></i>
                        <span> Danh sách xe </span>
                    </a>
                </li>
            </ul>

        </div>

        <div class="clearfix"></div>

    </div>

</div>