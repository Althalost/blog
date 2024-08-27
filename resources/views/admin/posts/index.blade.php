@extends('adminlte::page')

@section('title', 'Blog August')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{route('admin.posts.create')}}">New post</a>

    <h1>Posts List</h1>
@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-success" id="alert">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    @livewire('admin.posts-index')
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="resources/css/admin_custom.css">
@stop

@section('js')
    <script>
         $('#alert').fadeIn();     
            setTimeout(function() {
                $("#alert").fadeOut();           
            },2000);
    </script>
@stop