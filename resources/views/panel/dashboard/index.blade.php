@extends('layouts.panel')

@section('content')

    <x-page-admin-header :title="'Dashboard'"></x-page-admin-header>

    <section class="body-form-main">
        <div class="container-fluid">
            <div class="body-form-main__wrap">
                <x-filter-admin-list routeName="panel.dashboard.index" textFilterName="search"/>
                <div class="table-scroll">
                    <div class="table-structure">

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
