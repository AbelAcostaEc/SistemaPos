@extends('template.layout', ['html_tag_data' => [], 'title' => 'Perfil', 'description' => '', 'menu' => null, 'submenu' => null])

@section('title', 'Perfil')

@section('css')
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
@endsection

@section('content-title', 'Perfil')

@section('content')
    @livewire('administration::user-profile.user-profile')
@endsection

@section('js_page')
    <script src="{{ asset('assets/js/custom/account/settings/signin-methods.js') }}"></script>

    <script>
        // Phone
        I/* nputmask({
            "mask": "0999999999",
        }).mask("#phone_number"); */
    </script>
@endsection
