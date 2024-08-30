<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\PostsRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Cache;

class PostsController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware('can:admin.posts.index', only: ['index']),
            new Middleware('can:admin.posts.create', only: ['create', 'store']),
            new Middleware('can:admin.posts.edit', only: ['edit', 'update']),
            new Middleware('can:admin.posts.destroy', only: ['destroy'])
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();

        $categories = Category::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsRequest $request)
    {

        $post = Post::create($request->all());

        if ($request->file('image')) {
            $url = Storage::put('public/posts', $request->file('image'));

            $post->image()->create([
                'url' => $url
            ]);
        }

        Cache::flush();

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.edit', $post)->with('info', 'The post has been created');;
    }

    /**
     * Display the specified resource.
     */

    /* 
    public function show(Post $post)
    {
        return view('admin.posts.show', $post);
    }
    */
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        Gate::authorize('author', $post);

        $tags = Tag::all();
        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, Post $post)
    {

        Gate::authorize('author', $post);

        $post->update($request->all());

        if($request->file('image')){
            $url = Storage::put('public/posts', $request->file('image'));

            if($post->image){
                Storage::delete($post->image->url);

                $post->image->update([
                    'url' => $url
                ]);
            }else{
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        Cache::flush();

        return redirect()->route('admin.posts.edit', $post)->with('info', 'The post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        Gate::authorize('author', $post);

        $post->delete();

        Cache::flush();

        return redirect()->route('admin.posts.index', $post)->with('info', 'The post has been deleted');
    }
}
