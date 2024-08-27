@extends('layouts.panel')

@section('content')

    <x-page-admin-header :title="'Ustawienia serwisu APH'"></x-page-admin-header>

    <section class="body-form-main">
        <div class="container-fluid">
            <div class="body-form-main__wrap">
                <livewire:aph-token-generator/>
            </div>
        </div>
    </section>

@endsection
