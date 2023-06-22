@extends('template.layout', ['html_tag_data' => [], 'title' => 'Ordenes', 'description' => '', 'menu' => 3, 'submenu' => 1])

@section('title', 'Ordenes')

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('customize/styles.css') }}"> --}}
@endsection

@section('content-title', 'Ordenes')

@section('content')

    @livewire('salesmanagment::order.order')
@endsection

@section('js_page')
    <script type="text/javascript">
        window.livewire.on('hideModal', () => {
            $('#modalForm').modal('hide');
        });
    </script>
@endsection
