@extends('adminlte::page')

@section('title', 'Blog August')

@section('content_header')
        
    @can('admin.categories.create')
        <div class="float-right">
            <a class="btn btn-secondary" href="{{route('admin.categories.create')}}">Add Category</a>
        </div>
    @endcan
    <h1>List of categories</h1>

@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success custom-alert" id="alert" role="alert">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td width="10px">{{$category->id}}</td>
                            <td width="10px">{{$category->name}}</td>
                            <td width="10px">
                                @can('admin.categories.edit')
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.categories.edit', $category)}}">Edit</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.categories.destroy')
                                    <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}

    <style>
        .custom-alert {
            display: inline-flex;
            position: fixed;
	        bottom: 30px;
	        right: 20px;
            
        }
    </style>
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