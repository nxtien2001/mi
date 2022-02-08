<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">



        @auth
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                {{Auth::user()->name}}
            </a>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" href="{{route('change.password.get')}}">Đổi mật khẩu</a>
        </li>
        <li>
            <x-app-layout>
            </x-app-layout>
        </li>
        @endauth

    </ul>

</div>