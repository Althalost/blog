@extends('adminlte::page')

@section('title', 'Blog August')

@section('content_header')
    <h1>Edit role</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{route('admin.roles.update', $role)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Enter the name of the role" value="{{$role->name}}">

                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <h2 class="h3">List of Permissions</h2>

                <div class="list-group">
                @foreach ($permissions as $permission)
                    <li class="list-group-item">
                        <div class="ml-3">
                            <label class="form-check-label larger-label">
                                <input class="mr-1 form-check-input larger" type="checkbox" name="permissions[]" value="{{$permission->id}}"
                                    @foreach ($role->permissions as $old_permission)
                                        @checked($permission->id == $old_permission->id)
                                    @endforeach
                                >
                                {{$permission->description}}
                            </label>
                        </div>
                    </li>
                @endforeach
                </div>

                <button class="btn btn-primary mt-3" type="submit">Edit role</button>
                
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