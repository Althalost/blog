<?php

use App\Http\Controllers\Admin\BloggerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

Route::resource('posts', PostsController::class)->except('show')->names('admin.posts');

Route::resource('bloggers', BloggerController::class)->except('show','destroy')->names('admin.bloggers');