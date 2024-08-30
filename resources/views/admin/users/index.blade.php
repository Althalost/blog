@extends('adminlte::page')

@section('title', 'Blog August')

@section('content_header')
    <h1>Users List</h1>
@stop

@section('content')
    @livewire('admin.users-index')
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    
@stop