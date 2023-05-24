@extends('template.login')

@section('title', 'Login')

{{-- @section('css')
    @livewireStyles
@endsection

@section('js')
    @livewireScripts
@endsection --}}

@section('content')
    <!-- Alerts -->

    <!-- Alerts End -->
    @livewire('administration::authentication.login.login')
@endsection
