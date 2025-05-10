<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\adminCategoryController;
use App\Http\Controllers\DashboardPostController;

Route::get('/', function () {
    return view('home',[
        'title' => 'Home',
        'active' => 'Home',
    ]);
})->name('home');

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'active'=> 'About',
        'name' => 'Drylius Christian Cong',
        'email' => 'dryliuschristianc@gmail.com',
        'image' => 'cat.jpg'
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories',[
        "title"=> "Post Categories",
        "active"=> "Post Categories",
        "categories"=> Category::all() 
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index', [
        'title'=>'Dashboard',
        'active'=>''
    ]);
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::resource('/dashboard/categories', adminCategoryController::class)->except('show')->middleware('isAdmin');