@extends('template.layout', ['html_tag_data' => [], 'title' => 'Roles', 'description' => '', 'menu' => 1, 'submenu' => 2])

@section('title', 'Roles')

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('customize/styles.css') }}"> --}}
@endsection

@section('content-title', 'Roles')

@section('content')

    @livewire('administration::role.role')
@endsection

@section('js_page')
    <script type="text/javascript">
        window.livewire.on('hideModal', () => {
            $('#modalForm').modal('hide');
        });
    </script>
@endsection
