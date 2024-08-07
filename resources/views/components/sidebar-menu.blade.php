<style>
    @font-face {
        font-family: 'icomoon';
        src: url('{{ asset('icon/panel/icomoon.eot?vfec74') }}');
        src: url('{{ asset('icon/panel/icomoon.eot?vfec74#iefix') }}') format('embedded-opentype'),
        url('{{ asset('icon/panel/icomoon.ttf?vfec74') }}') format('truetype'),
        url('{{ asset('icon/panel/icomoon.woff?vfec74') }}') format('woff'),
        url('{{ asset('icon/panel/icomoon.svg?vfec74#icomoon') }}') format('svg');
        font-weight: normal;
        font-style: normal;
        font-display: block;
    }
</style>
<section class="header-sidebar">
    <div><a><img class="sidebar-logo" src="{{ asset('img/aph-logo.png') }}" alt=""></a></div>
    <button class="header-toggle-btn"></button>
    <ul class="header-navbar">
        <li @if(request()->routeIs('panel.dashboard.*')) class="active" @endif><a href="{{route('panel.dashboard.index')}}"><i class="fa-solid fa-cube" style="color: #75C9EB"></i><span>Dashboard</span></a></li>
    </ul>
    <form id="logout-form" action="{{route('panel.auth.logout')}}" method="POST" class="d-none">
        @csrf
    </form>
</section>
