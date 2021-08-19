<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $top_ten_favorite_posts = Auth::user()->posts()->withCount('favorites')->orderBy('favorites_count','desc')->take(10)->get();
        $top_ten_ranking_posts = Auth::user()->posts()->orderBy('view_count','desc')->take(10)->get();
        $top_ten_commentable_posts = Auth::user()->posts()->withCount('comments')->orderBy('comments_count','desc')->take(10)->get();
        $yesterday_posts = Auth::user()->posts()->whereDate('created_at',Carbon::yesterday())->count();
        $yesterday_approved_posts = Auth::user()->posts()->where('is_approved',1)->whereDate('created_at',Carbon::yesterday())->get();
        $yesterday_pending_posts = Auth::user()->posts()->where('is_approved',0)->whereDate('created_at',Carbon::yesterday())->get();
        $yesterday_published_posts = Auth::user()->posts()->where('status',1)->whereDate('created_at',Carbon::yesterday())->get();
        $yesterday_none_published_posts = Auth::user()->posts()->where('status',0)->whereDate('created_at',Carbon::yesterday())->get();
        $today_posts = Auth::user()->posts()->whereDate('created_at',Carbon::today())->count();
        $today_approved_posts = Auth::user()->posts()->where('is_approved',1)->whereDate('created_at',Carbon::today())->get();
        $today_pending_posts = Auth::user()->posts()->where('is_approved',0)->whereDate('created_at',Carbon::today())->get();
        $today_published_posts = Auth::user()->posts()->where('status',1)->whereDate('created_at',Carbon::today())->get();
        $today_none_published_posts = Auth::user()->posts()->where('status',0)->whereDate('created_at',Carbon::today())->get();
        $pending_posts = Auth::user()->posts()->where('is_approved',0)->count();
        $approved_posts = Auth::user()->posts()->where('is_approved',1)->count();
        $published_posts = Auth::user()->posts()->where('status',1)->count();
        $none_published_posts = Auth::user()->posts()->where('status',0)->count();
        $posts_total_view_count = Auth::user()->posts()->sum('view_count');
        $top_ten_popular_posts = Auth::user()->posts()->withCount('comments')->withCount('favorites')->orderBy('view_count','desc')->orderBy('comments_count','desc')->orderBy('favorites_count','desc')->take(10)->get();
        return view('author.dashboard',compact('top_ten_popular_posts','top_ten_favorite_posts','top_ten_ranking_posts','top_ten_commentable_posts','yesterday_posts','yesterday_approved_posts','yesterday_pending_posts','yesterday_published_posts','yesterday_none_published_posts','today_posts','today_approved_posts','today_pending_posts','today_published_posts','today_none_published_posts','pending_posts','approved_posts','published_posts','none_published_posts','posts_total_view_count'));
    }
}
