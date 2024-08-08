@extends('layouts.panel')

@section('content')

    <x-page-admin-header :title="'Ustawienia serwisu APH'"></x-page-admin-header>

    <section class="body-form-main">
        <div class="container-fluid">
            <div class="body-form-main__wrap">
                <form action="#" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row form-row--title w-50 mb-3">
                        <label for="token">Token API APH Connector</label>
                        <div class="input-container">
                            <input type="text" class="form-control" placeholder="Wygeneruj Token API Baselinker" disabled name="token" id="token" value="">
                            <div class="tooltip-custom">
                                <i class="fa-solid fa-clipboard" id="copy-clipboard-btn-1"></i>
                                <span class="tooltiptext" id="text-tooltip-1">Skopiuj do schowka</span>
                            </div>
                        </div>


                    </div>
                    <div class="form-row form-row--title w-50 mb-3">
                        <div class="input-container">
                            <label for="domain">Domena APH Connector</label>
                            <div class="input-container">
                                <input type="text" class="form-control" id="domain" disabled placeholder="Domena" value="{{config('app.url')}}"/>
                                <div class="tooltip-custom">
                                    <i class="fa-solid fa-clipboard" id="copy-clipboard-btn-2"></i>
                                    <span class="tooltiptext" id="text-tooltip-2">Skopiuj do schowka</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>

@endsection
