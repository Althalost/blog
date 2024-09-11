@extends('adminlte::page')

@section('title', 'Blog August')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{ URL::previous() }}">Go back</a>
    <h1>Blogger Profile</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
                <div class="mb-3">

                        <img class="rounded-circle d-inline" src="{{$user->profile_photo_url}}" alt="profile-photo">  
                        <h3 class="d-inline ml-3">{{$user->name}}</h3>
                </div>

                <div class="mb-4">
                    <span>
                        @if (isset($user->blogger->presentation))
                            {{$user->blogger->presentation}}
                        @endif
                    </span>

                </div>

                @if (isset($user->blogger))
                    <a class="btn btn-primary btn-sm" href="{{route('admin.bloggers.edit', $user->blogger)}}">Edit Presentation</a>
                @else
                    <a class="btn btn-primary btn-sm" href="{{route('admin.bloggers.create')}}">Add Presentation</a>
                @endif
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
        $('#alert').fadeIn();     
        setTimeout(function() {
            $("#alert").fadeOut();           
        },2000);
    </script>
@stop