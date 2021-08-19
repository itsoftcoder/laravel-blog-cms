<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $total_view = Post::sum('view_count');
        $total_comments = Comment::all()->count();
        $total_none_published_all_posts = Post::where('status',0)->count();
        $total_published_all_posts = Post::where('status',1)->count();
        $total_approved_all_posts = Post::where('is_approved',1)->count();
        $total_pending_all_posts = Post::where('is_approved',0)->count();
        $total_natives = User::natives()->count();
        $total_subscribers = User::subscribers()->count();
        $total_authors = User::authors()->count();
        $total_users = User::all()->count();
        $total_categories = Category::all()->count();
        $total_tags = Tag::all()->count();
        $total_posts = Post::all()->count();
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
        return view('admin.dashboard',compact('total_categories','total_tags','top_ten_popular_posts','top_ten_favorite_posts','top_ten_ranking_posts','top_ten_commentable_posts','yesterday_posts','yesterday_approved_posts','yesterday_pending_posts','yesterday_published_posts','yesterday_none_published_posts','today_posts','today_approved_posts','today_pending_posts','today_published_posts','today_none_published_posts','pending_posts','approved_posts','published_posts','none_published_posts','posts_total_view_count','total_posts','total_authors','total_natives','total_subscribers','total_view','total_users','total_comments','total_approved_all_posts','total_pending_all_posts','total_published_all_posts','total_none_published_all_posts'));

    }

    public function authors()
    {
        $authors = User::authors()->get();
        return view('admin.authors',compact('authors'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $old_image_path = base_path('public/upload/users/'.$user->image);
        if (file_exists($old_image_path)){
            if (unlink($old_image_path)){
                $user->favorites()->detach();
                $user->comments()->delete();
                $user->notifications()->delete();

                foreach ($user->posts as $post){
                    $post->favorites()->detach();
                    $post->tags()->detach();
                    $post->categories()->detach();
                    $post->notifications()->delete();
                    $post->comments()->delete();
                }

                $user->posts()->delete();
                $user->delete();
                return back();
            }
        }else{
            $user->favorites()->detach();
            $user->comments()->delete();
            $user->notifications()->delete();
            foreach ($user->posts as $post){
                $post->favorites()->detach();
                $post->tags()->detach();
                $post->categories()->detach();
                $post->comments()->delete();
                $post->notifications()->delete();
            }
            $user->posts()->delete();
            $user->delete();
            return back();
        }
    }
}
