<?php

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

Route::get('/',[App\Http\Controllers\FrontendController::class, 'welcome']);
Route::get('/posts',[App\Http\Controllers\FrontendController::class, 'posts'])->name('posts');
Route::get('/post/{slug?}',[App\Http\Controllers\FrontendController::class, 'post'])->name('post');
Route::get('/category/{slug?}',[App\Http\Controllers\FrontendController::class, 'categoryPosts'])->name('category_posts');
Route::get('/tag/{slug?}',[App\Http\Controllers\FrontendController::class, 'tagPosts'])->name('tag_posts');
Route::get('/author/{slug?}',[App\Http\Controllers\FrontendController::class, 'userPosts'])->name('user_posts');
Route::post('/comment/{post}',[App\Http\Controllers\CommentController::class, 'store'])->name('comment_store');
Route::get('/favorite/{id}/add',[App\Http\Controllers\FavoritePostController::class, 'store'])->name('add_favorite');
Route::get('/search',[App\Http\Controllers\FrontendController::class, 'search'])->name('search');
Route::post('/search',[App\Http\Controllers\FrontendController::class, 'searchData'])->name('search.data');
Route::get('contact',[App\Http\Controllers\FrontendController::class, 'contact'])->name('contact');

Auth::routes();

Route::post('/subscriber',[App\Http\Controllers\SubscriberController::class, 'store'])->name('subscriber');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth','admin']],function (){
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('tag',[App\Http\Controllers\Admin\TagController::class,'index'])->name('tag.index');
    Route::get('tag/create',[App\Http\Controllers\Admin\TagController::class,'create'])->name('tag.create');
    Route::post('tag',[App\Http\Controllers\Admin\TagController::class,'store'])->name('tag.store');
    Route::get('tag/{id}/edit',[App\Http\Controllers\Admin\TagController::class,'edit'])->name('tag.edit');
    Route::put('tag/{id}',[App\Http\Controllers\Admin\TagController::class,'update'])->name('tag.update');
    Route::delete('tag/{id}',[App\Http\Controllers\Admin\TagController::class,'destroy'])->name('tag.destroy');
    Route::get('category',[App\Http\Controllers\Admin\CategoryController::class,'index'])->name('category.index');
    Route::get('category/create',[App\Http\Controllers\Admin\CategoryController::class,'create'])->name('category.create');
    Route::post('category',[App\Http\Controllers\Admin\CategoryController::class,'store'])->name('category.store');
    Route::get('category/{id}/edit',[App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('category.edit');
    Route::put('category/{id}',[App\Http\Controllers\Admin\CategoryController::class,'update'])->name('category.update');
    Route::delete('category/{id}',[App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('category.destroy');
    Route::get('post',[App\Http\Controllers\Admin\PostController::class,'index'])->name('post.index');
    Route::get('post/create',[App\Http\Controllers\Admin\PostController::class,'create'])->name('post.create');
    Route::post('post',[App\Http\Controllers\Admin\PostController::class,'store'])->name('post.store');
    Route::get('post/{id}',[App\Http\Controllers\Admin\PostController::class,'show'])->name('post.show');
    Route::get('post/{id}/edit',[App\Http\Controllers\Admin\PostController::class,'edit'])->name('post.edit');
    Route::put('post/{id}',[App\Http\Controllers\Admin\PostController::class,'update'])->name('post.update');
    Route::delete('post/{id}',[App\Http\Controllers\Admin\PostController::class,'destroy'])->name('post.destroy');

    Route::get('/authors',[App\Http\Controllers\Admin\DashboardController::class,'authors'])->name('authors.index');
    Route::delete('authors/{id}',[App\Http\Controllers\Admin\DashboardController::class,'destroy'])->name('authors.destroy');

    Route::get('profile',[App\Http\Controllers\Admin\ProfileController::class,'index'])->name('profile');
    Route::put('profile/{id}',[App\Http\Controllers\Admin\ProfileController::class,'update'])->name('profile.update');

    Route::get('setting',[App\Http\Controllers\Admin\ProfileController::class,'setting'])->name('setting');
    Route::put('setting/{id}',[App\Http\Controllers\Admin\ProfileController::class,'change'])->name('setting.change');

    Route::get('/pending/post',[App\Http\Controllers\Admin\PostController::class,'pending'])->name('post.pending');
    Route::put('approve/{slug}',[App\Http\Controllers\Admin\PostController::class,'approve'])->name('post.approve');

    Route::get('subscriber',[App\Http\Controllers\Admin\SubscriberController::class,'index'])->name('subscriber.index');
    Route::delete('subscriber/{id}',[App\Http\Controllers\Admin\SubscriberController::class,'destroy'])->name('subscriber.destroy');

    Route::get('native',[App\Http\Controllers\Admin\NativeController::class,'index'])->name('native.index');
    Route::delete('native/{id}',[App\Http\Controllers\Admin\NativeController::class,'destroy'])->name('native.destroy');

    Route::delete('comments/{id}',[App\Http\Controllers\Admin\ProfileController::class,'commentDelete'])->name('comment.destroy');
    Route::delete('favorite/{id}',[App\Http\Controllers\Admin\ProfileController::class,'favoriteDelete'])->name('favorite.destroy');
});

Route::group(['as' => 'author.', 'prefix' => 'author', 'middleware' => ['auth','author']],function (){
    Route::get('dashboard',[App\Http\Controllers\Author\DashboardController::class,'index'])->name('dashboard');
    Route::get('post',[App\Http\Controllers\Author\PostController::class,'index'])->name('post.index');
    Route::get('post/create',[App\Http\Controllers\Author\PostController::class,'create'])->name('post.create');
    Route::post('post',[App\Http\Controllers\Author\PostController::class,'store'])->name('post.store');
    Route::get('post/{id}',[App\Http\Controllers\Author\PostController::class,'show'])->name('post.show');
    Route::get('post{id}/edit',[App\Http\Controllers\Author\PostController::class,'edit'])->name('post.edit');
    Route::put('post/{id}',[App\Http\Controllers\Author\PostController::class,'update'])->name('post.update');
    Route::delete('post/{id}',[App\Http\Controllers\Author\PostController::class,'destroy'])->name('post.destroy');
    Route::get('profile',[App\Http\Controllers\Author\ProfileController::class,'index'])->name('profile');
    Route::put('profile/{id}',[App\Http\Controllers\Author\ProfileController::class,'update'])->name('profile.update');
    Route::get('setting',[App\Http\Controllers\Author\ProfileController::class,'setting'])->name('setting');
    Route::put('setting/{id}',[App\Http\Controllers\Author\ProfileController::class,'change'])->name('setting.change');
    Route::delete('comments/{id}',[App\Http\Controllers\Author\ProfileController::class,'commentDelete'])->name('comment.destroy');
    Route::delete('favorite/{id}',[App\Http\Controllers\Author\ProfileController::class,'favoriteDelete'])->name('favorite.destroy');

});

\Illuminate\Support\Facades\View::composer('frontend.sidebar',function ($view){
    $categories = \App\Models\Category::all();
    $tags = \App\Models\Tag::all();
    $authors = \App\Models\User::where('role_id',1)->orWhere('role_id',2)->get();
    $top_ranking_posts = \App\Models\Post::withCount('comments')->withCount('favorites')->orderBy('view_count','desc')->orderBy('favorites_count','desc')->orderBy('comments_count','desc')->approved()->published()->take(6)->get();

    return $view->with(['categories' => $categories, 'tags'=> $tags,'authors' => $authors,'top_ranking_posts' => $top_ranking_posts]);
});

\Illuminate\Support\Facades\View::composer('layouts.frontend',function ($view){
    $categories = \App\Models\Category::all();
    $tags = \App\Models\Tag::all();
    $authors = \App\Models\User::where('role_id',1)->orWhere('role_id',2)->get();
    return $view->with(['categories' => $categories, 'tags'=> $tags,'authors' => $authors]);
});
