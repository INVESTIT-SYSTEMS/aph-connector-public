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
        <li @if(request()->routeIs('panel.dashboard.*')) class="active" @endif><a href="{{route('panel.dashboard.index')}}"><i class="fa-solid fa-cube" @if(request()->routeIs('panel.dashboard.*')) style="color: #75C9EB" @endif></i><span @if(request()->routeIs('panel.dashboard.*')) style="color: #75C9EB" @endif>Dashboard</span></a></li>
        <li @if(request()->routeIs('panel.baselinker.*')) class="active" @endif><a href="{{route('panel.baselinker.index')}}"><i class="fa-solid fa-cube" @if(request()->routeIs('panel.baselinker.*')) style="color: #75C9EB" @endif></i><span @if(request()->routeIs('panel.baselinker.*')) style="color: #75C9EB" @endif>Baselinker</span></a></li>
        <li @if(request()->routeIs('panel.aph-settings.*')) class="active" @endif><a href="{{route('panel.aph-settings.index')}}"><i class="fa-solid fa-cube" @if(request()->routeIs('panel.aph-settings.*')) style="color: #75C9EB" @endif></i><span @if(request()->routeIs('panel.aph-settings.*')) style="color: #75C9EB" @endif>Ustawienia APH-Serwis</span></a></li>
    </ul>
    <form id="logout-form" action="{{route('panel.auth.logout')}}" method="POST" class="d-none">
        @csrf
    </form>
</section>
