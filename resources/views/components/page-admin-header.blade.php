<header class="page-header">
    <div class="container-fluid">
        <div class="page-header__wrap">
            <div class="page-header-left">
                <h4>{{ $title }}</h4>
            </div>
            <div class="page-header-right">
                {{ $slot }}
                <div class="user-login">
                    <a href="#" class="dropdown-toggle"><i class="icon-icon15"></i></a>
                    <div class="dropdown-menu">
                        <form id="logout-form" action="{{route('admin.auth.logout')}}" method="POST" >
                            @csrf
                        <input type="submit" value="Wyloguj"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
