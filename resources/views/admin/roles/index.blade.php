@extends('adminlte::page')

@section('title', 'Blog August')

@section('content_header')
    <div class="float-right">
        <a class="btn btn-secondary" href="{{route('admin.roles.create')}}">Add role</a>
    </div>
    <h1>List of roles</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                <a class="btn btn-sm btn-primary" href="{{route('admin.roles.edit', $role)}}" >Edit</a>
                            </td>
    
                            <td width="10px">
                                <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

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
@stop

@section('js')
    <script src="{{asset('/build/assets/admin_custom.js')}}"></script>
@stop