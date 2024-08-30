@extends('adminlte::page')

@section('title', 'Blog August')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{ URL::previous() }}">Go back</a>
    <h1>Add new category</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.categories.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Enter the name of the category">

                    @error('name')
                        <span class="text-danger" >{{$message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    <label class="form-label" for="slug">Slug</label>
                    <input class="form-control" type="text" name="slug" id="slug" placeholder="Enter the Slug of the category" readonly>

                    @error('slug')
                        <span class="text-danger" >{{$message}}</span>
                    @enderror

                </div>

                <button class="btn btn-primary" type="submit">Create category</button>
            </form>
        </div>
    </div>

    @if (session('info'))
        <div class="alert alert-success" id="alert">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        $('#alert').fadeIn();     
        setTimeout(function() {
            $("#alert").fadeOut();           
        },2000);
    </script>
@stop