<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ReadRssController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/', function () {
    $posts = Post::paginate(2);
    return view('welcome',  compact('posts'));
});

Route::feeds();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts');
    Route::get('/rss/{id}',[PostsController::class,'getOne']);
    Route::post('/delete/{id}',[PostsController::class,'destroy'])->name('delete');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




    Route::resource('/rssReader',ReadRssController::class);
});
