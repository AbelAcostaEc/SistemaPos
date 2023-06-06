@extends('template.layout', ['html_tag_data' => [], 'title' => 'Permisos', 'description' => '', 'menu' => 1, 'submenu' => 3])

@section('title', 'Permisos')

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('customize/styles.css') }}"> --}}
@endsection

@section('content-title', 'Permisos')

@section('content')

    @livewire('administration::permission.permission')
@endsection

@section('js_page')
    <script type="text/javascript">
        window.livewire.on('hideModal', () => {
            $('#modalForm').modal('hide');
        });
    </script>
@endsection
