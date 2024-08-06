<style>
    @font-face {
        font-family: 'icomoon';
        src: url('{{ asset('icon/admin/icomoon.eot?vfec74') }}');
        src: url('{{ asset('icon/admin/icomoon.eot?vfec74#iefix') }}') format('embedded-opentype'),
        url('{{ asset('icon/admin/icomoon.ttf?vfec74') }}') format('truetype'),
        url('{{ asset('icon/admin/icomoon.woff?vfec74') }}') format('woff'),
        url('{{ asset('icon/admin/icomoon.svg?vfec74#icomoon') }}') format('svg');
        font-weight: normal;
        font-style: normal;
        font-display: block;
    }
</style>
@php
    $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
@endphp
<section class="header-sidebar">
    <div><a><img class="sidebar-logo" src="{{ asset('img/logo.png') }}" alt=""></a></div>
    <button class="header-toggle-btn"></button>
    <ul class="header-navbar">
        <li @if(request()->routeIs('admin.panel.forms.*')) class="active" @endif><a href="{{route('admin.panel.forms.index')}}"><i class="fa-solid fa-cube"></i><span>Lista formularzy</span></a></li>
        <li @if(request()->routeIs('admin.panel.users.*')) class="active" @endif><a href="{{route('admin.panel.users.index')}}"><i class="fa-solid fa-cube"></i><span>Wyszukiwarka</span></a></li>
        @if(auth('web')->user()->isSuperAdmin())
            <li @if(request()->routeIs('admin.panel.admins.*')) class="active" @endif><a href="{{route('admin.panel.admins.index')}}"><i class="fa-solid fa-users"></i><span>Administratorzy</span></a></li>
        @endif
        <li><a target="_blank" href="{{route('admin.panel.translations.index')}}"><i class="fa-solid fa-language"></i><span>Tłumaczenia</span></a></li>
        <li @if(request()->routeIs('admin.panel.lists.*')) class="active" @endif><a href="{{route('admin.panel.lists.index')}}"><i class="fa-solid fa-list"></i><span>Zestawienia</span></a></li>
    </ul>
    <form id="logout-form" action="{{route('auth.logout')}}" method="POST" class="d-none">
        @csrf
    </form>
</section>
