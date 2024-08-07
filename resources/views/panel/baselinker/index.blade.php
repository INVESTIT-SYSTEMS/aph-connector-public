@extends('layouts.panel')

@section('content')

    <x-page-admin-header :title="'Integracja Baselinker'"></x-page-admin-header>

    <section class="body-form-main">
        <div class="container-fluid">
            <div class="body-form-main__wrap">
                <form action="{{route('panel.baselinker.store-token')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row form-row--title w-50 mb-3">
                        <label for="token">Token API Baselinker</label>
                        <input type="text" class="form-control" placeholder="Token API Baselinker" name="token" id="token" value="{{$token}}"/>
                        <button type="submit" class="btn btn-blue mt-2">Zapisz</button>
                    </div>

                </form>
                <livewire:baselinker-tester token="{{$token}}" is-token-verified="{{$isVerified}}"/>

            </div>
        </div>
    </section>

@endsection
