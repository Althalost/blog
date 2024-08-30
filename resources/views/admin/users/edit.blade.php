@extends('adminlte::page')

@section('title', 'Blog August')

@section('content_header')
    <h1>Role assignment</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success" id="alert">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <p class="h5" >Name</p>
            <p class="form-control">{{$user->name}}</p>


            <h2 class="h5">List of Roles</h2>
            <form action="{{route('admin.users.update', $user)}}" method="post">
                @csrf
                @method('PUT')
                
                @foreach ($roles as $role)
                    <div>
                        <label for="roles[]">
                            <input class="mr-1" type="checkbox" name="roles[]" value="{{$role->name}}"
                                @foreach ($user->roles as $old_role)
                                    @checked($old_role->name == $role->name)
                                @endforeach
                            >
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach
                <input class="btn btn-primary mt-2" type="submit" value="Assign role">
            </form>     
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <style>
         .alert{
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
    </style>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    <script>
         $('#alert').fadeIn();     
            setTimeout(function() {
                $("#alert").fadeOut();           
            },2000);
    </script>
@stop