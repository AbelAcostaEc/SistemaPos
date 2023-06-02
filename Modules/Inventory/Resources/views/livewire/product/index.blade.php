@extends('template.layout', ['html_tag_data' => [], 'title' => 'Productos', 'description' => '', 'menu' => 2, 'submenu' => 1])

@section('title', 'Productos')

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('customize/styles.css') }}"> --}}
@endsection

@section('content-title', 'Productos')

@section('content')

    @livewire('inventory::product.product')
@endsection

@section('js_page')
    <script type="text/javascript">
        window.livewire.on('hideModal', () => {
            $('#modalForm').modal('hide');
        });
    </script>
@endsection
