<?php

use App\Http\Controllers\AdminCategoryContoller;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Halaman singgle Post



Route::get('/', function() {
    return view('home', [
        "title" => 'Home',
        "active" => 'Home'
    ]);
});
Route::get('/about', function() {
    return view('about', [
        "title" => 'About',
        "active" => 'About'
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}',[PostController::class , 'show'] );


Route::get('/categories', function() {
   return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

// Route Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticat']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route Dashboard
Route::get('/dashboard', function(){

    return view('dashboard.index');

})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('posts', [
//         'title' => "Post By Category : $category->name",
//         'active' => 'categories',
//         'posts' => $category->posts->load('category', 'author')
//     ]);
// });

// Route::get('/author/{author:username}', function(User $author) {
//     return view('posts', [
//         'title' => "Post By Author : $author->name",
//         'posts' => $author->posts->load('category' , 'author')
//     ]);
// });
