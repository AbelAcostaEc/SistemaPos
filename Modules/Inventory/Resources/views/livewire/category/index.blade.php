@extends('template.layout', ['html_tag_data' => [], 'title' => 'Categorias', 'description' => '', 'menu' => 2, 'submenu' => 2])

@section('title', 'Categorias')

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('customize/styles.css') }}"> --}}
@endsection

@section('content-title', 'Categorias')

@section('content')

    @livewire('inventory::category.category')
@endsection

@section('js_page')
    <script type="text/javascript">
        window.livewire.on('hideModal', () => {
            $('#modalForm').modal('hide');
        });
    </script>
@endsection
