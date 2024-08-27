@extends('adminlte::page')

@section('title', 'Blog August')

@section('content_header')
    <h1>Edit Post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.posts.update', $post)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Enter the post name" value="{{$post->name}}" autocomplete="off">

                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input class="form-control" type="text" name="slug" id="slug" placeholder="Enter the post slug" value="{{$post->slug}}" readonly>

                    @error('slug')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category_id">Categories</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="" selected disabled hidden>Choose here</option>
                        @foreach ($categories as $category)

                            @if ($post->category_id == $category->id)
                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        
                        @endforeach
                    </select>
                    @error('category_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <p class="font-weight-bold">Tags</p>
                        
                    @foreach ($tags as $tag)

                        <label class="mr-2">
                                    <input type="checkbox" name="tags[]" value="{{$tag->id}}"
                                    @foreach ($post->tags as $item)
                                        @checked($item->id == $tag->id)
                                    @endforeach
                                    >
                                    {{$tag->name}}
                        </label>
                    @endforeach

                    @error('tags')
                        <br>
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Status</p>

                        <label class="mr-2">
                            <input type="radio" id="status1" name="status" value="1" @checked($post->status == 1)>
                            Draft
                        </label>

                        <label class="mr-2">
                            <input type="radio" id="status2" name="status" value="2" @checked($post->status == 2)>
                            Published
                        </label>
                 


                    @error('status')
                        <br>
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="image-wrapper">
                            @if ($post->image)
                                <img src="{{Storage::url($post->image->url)}}" id="img_reference" alt=""> 
                            @else
                                <img src="https://cdn.pixabay.com/photo/2017/07/06/19/57/sky-2479213_1280.jpg" id="img_reference" alt="">
                            @endif
                           
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="image">Select a post image</label>
                            <input class="form-control-file" type="file" name="image" id="image" accept="image/*">

                            @error('image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur reprehenderit mollitia, sunt consectetur ducimus ipsam accusamus quas, unde obcaecati nihil voluptates! Reprehenderit dolorem sequi quibusdam officia temporibus sit atque quam.
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="extract">Extracto</label>
                    <textarea class="form-control" name="extract" id="extract" cols="10" rows="3">{{$post->extract}}</textarea>

                    @error('extract')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="body">Post body</label>
                    <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{$post->body}}</textarea>

                    @error('body')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                
                <button class="btn btn-primary" type="submit">Update post</button>
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
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css" />
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;       
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .alert{
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
    </style>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="{{asset('vendor/ckeditor5/ckeditor5.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        document.getElementById("image").addEventListener('change', changeImage);
        function changeImage(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("img_reference").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }

        $('#alert').fadeIn();     
        setTimeout(function() {
            $("#alert").fadeOut();           
        },2000);
    </script>


    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
            }
        }
    </script>


    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph
        } from 'ckeditor5';

        ClassicEditor
            .create( document.querySelector( '#extract' ), {
                plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
                toolbar: {
                    items: [
                        'undo', 'redo', '|', 'bold', 'italic', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                    ]
                }
            } )
            .then( /* ... */ )
            .catch( /* ... */ );
        
        ClassicEditor
            .create( document.querySelector( '#body' ), {
                plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
                toolbar: {
                    items: [
                        'undo', 'redo', '|', 'bold', 'italic', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                    ]
                }
            } )
            .then( /* ... */ )
            .catch( /* ... */ );
    </script>
@stop