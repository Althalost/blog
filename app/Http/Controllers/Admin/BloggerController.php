<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogger;
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class BloggerController extends Controller
{
    public static function middleware(): array
    {
        return [
            'auth',
            new Middleware('can:admin.bloggers.index', only: ['index']),
            new Middleware('can:admin.bloggers.create', only: ['create', 'store']),
            new Middleware('can:admin.bloggers.edit', only: ['edit', 'update']),
        ];
    }


       /**
     * Display the specified resource.
     */
    public function index()
    {
        $user = auth()->user();
        return view('admin.bloggers.index', compact('user'));
    }

       /**
     * Display the specified resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('admin.bloggers.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $blogger = auth()->user()->blogger()->create($request->all());

        return redirect()->route('admin.bloggers.index', $blogger)->with('info', 'The presentation has been added');
    }


      /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogger $blogger)
    {
        return view('admin.bloggers.edit', compact('blogger'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blogger $blogger)
    {
        $blogger->update($request->all());

        return redirect()->route('admin.bloggers.index', $blogger)->with('info', 'The presentation has been updated');
    }


}
