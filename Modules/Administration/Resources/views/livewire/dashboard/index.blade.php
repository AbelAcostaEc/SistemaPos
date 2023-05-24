@extends('template.layout',['html_tag_data'=>[], 'title'=> 'Dashboard', 'description'=>'', 'menu' => null, 'submenu' => null])

@section('title', 'dashboard')

@section('content')
    @livewire('administration::dashboard.dashboard')
@endsection
