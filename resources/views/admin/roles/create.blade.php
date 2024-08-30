@extends('adminlte::page')

@section('title', 'Blog August')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{route('admin.roles.index')}}">Go back</a>
    <h1>Create role</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{route('admin.roles.store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Enter the name of the role">

                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <h2 class="h3">List of Permissions</h2>

                <div class="list-group">
                    @foreach ($permissions as $permission)
                        <li class="list-group-item hover">
                            <div class="form-check">
                                <label class="form-check-label larger-label">
                                    <input class="form-check-input larger" type="checkbox" name="permissions[]" value="{{$permission->id}}">
                                    {{$permission->description}}
                                </label>
                            </div>
                        </li>
                @endforeach
                </div>
                <button class="btn btn-primary mt-4" type="submit">Create role</button>

            </form>

        </div>
    </div>

    
    @if (session('info'))
        <div class="alert alert-success" id="alert">
            {{session('info')}}
        </div>
    @endif

@stop

@section('css')
    <link rel="stylesheet" href="/build/assets/admin_custom.css">
    <style>
        li:hover {
            background-color: lightgray;
        }

        label {
            width:100%;
        }
        label.larger-label{
            margin-left: 10px;
        }

        input.larger {
        float: left;
        margin-right: 30px;
        padding-right: 30px;
      }
    </style>
@stop

@section('js')
    <script src="{{asset('/build/assets/admin_custom.js')}}"></script>
@stop