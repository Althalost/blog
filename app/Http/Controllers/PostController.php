<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;

use Illuminate\Support\Facades\Cache;

use function Laravel\Prompts\search;

class PostController extends Controller
{

    public function index(){

        if(request()->page){
            $key = 'posts' . request()->page;
        }else{
            $key = 'post';
        }

        if(Cache::has($key)){
            $posts = Cache::get($key);
        }else{
            $posts = Post::where('status', 2)->latest('id')->paginate(10);
            Cache::put($key, $posts);
        }

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){

        $author = User::find($post->user_id);

        $comments = Comment::where('post_id', $post->id)->get();

        Gate::authorize('published', $post);

        $similar = Post::where('category_id', $post->category_id)
                                ->where('status', 2)
                                ->where('id','!=', $post->id)
                                ->latest('id')
                                ->take(4)
                                ->get();

        return view('posts.show', compact('post', 'similar', 'author' , 'comments'));
    }

    public function category(Category $category){


        $posts = Post::where('category_id', $category->id)
                        ->where('status', 2)
                        ->latest('id')
                        ->paginate(6);

        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag){
        
        $posts =  $tag->posts()->where('status', 2)->latest('id')->paginate(6);

        return view('posts.tag', compact('posts', 'tag'));
    }
}
