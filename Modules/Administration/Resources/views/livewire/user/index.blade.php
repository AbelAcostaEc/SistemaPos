@extends('template.layout', ['html_tag_data' => [], 'title' => 'Usuarios', 'description' => '', 'menu' => 1, 'submenu' => 1])

@section('title', 'Usuarios')

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('customize/styles.css') }}"> --}}
@endsection

@section('content-title', 'Usuarios')

@section('content')

    @livewire('administration::user.user')
@endsection

@section('js_page')
    <script type="text/javascript">
        window.livewire.on('hideModal', () => {
            $('#modalForm').modal('hide');
        });
    </script>
@endsection
