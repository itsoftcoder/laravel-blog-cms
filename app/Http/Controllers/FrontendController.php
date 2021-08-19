<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function welcome()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $authors = User::where('role_id',1)->orWhere('role_id',2)->paginate(10);
        $posts = Post::latest()->approved()->published()->take(12)->get();
        $latest_posts = Post::latest()->approved()->published()->take(6)->get();
        $popular_posts = Post::withCount('comments')->withCount('favorites')->orderBy('view_count','desc')->orderBy('favorites_count','desc')->orderBy('comments_count','desc')->approved()->published()->take(10)->get();
        $top_favorite_posts = Post::withCount('favorites')->orderBy('favorites_count','desc')->approved()->published()->take(20)->get();
        $top_ten_view_posts = Post::orderBy('view_count','desc')->approved()->published()->take(10)->get();
        $random_posts = $posts;
        if ($posts->count() >= 11){
            $random_posts = Post::latest()->approved()->published()->get()->random(12);
        }

        return view('welcome',compact('authors','categories','tags','posts','random_posts','latest_posts','popular_posts','top_favorite_posts','top_ten_view_posts'));
    }


    public function posts()
    {
        $posts = Post::latest()->approved()->published()->paginate(20);
        return view('frontend.posts',compact('posts'));
    }


    public function post($slug)
    {
       $post = Post::whereSlug($slug)->first();
       $authors = User::where('role_id',1)->orWhere('role_id',2)->paginate(10);
       $random_posts = Post::latest()->approved()->published()->get()->random(3);
       $popular_posts = Post::withCount('comments')->withCount('favorites')->orderBy('view_count','desc')->orderBy('favorites_count','desc')->orderBy('comments_count','desc')->approved()->published()->get();
       $top_five_favorite_posts = Post::withCount('favorites')->orderBy('favorites_count','desc')->approved()->published()->paginate(5);

        $blogkey = 'blog-'.$post->slug;
       if (!Session::has($blogkey)){
           $post->increment('view_count');
           Session::put($blogkey,1);
       }
       return view('frontend.post',compact('authors','post','random_posts','popular_posts','top_five_favorite_posts'));
    }

    public function categoryPosts($slug)
    {
        $category = Category::whereSlug($slug)->first();
        $posts = $category->posts()->approved()->published()->paginate(16);
        return view('frontend.category-posts',compact('category','posts'));
    }

    public function tagPosts($slug)
    {
        $tag = Tag::whereSlug($slug)->first();
        $posts = $tag->posts()->approved()->published()->paginate(16);
        return view('frontend.tag-posts',compact('tag','posts'));
    }

    public function userPosts($username)
    {

        $user = User::whereUsername($username)->first();
        $posts = $user->posts()->approved()->published()->paginate(16);
        return view('frontend.user-posts',compact('user','posts'));
    }

    public function search(Request $request)
    {
        $query = $request->get('search');
        $posts = Post::where("title","LIKE","%$query%")->orWhere("body","LIKE","%$query%")->approved()->published()->paginate(16);
        return view('frontend.search',compact('posts','query'));
    }

    public function searchData(Request $request)
    {
        if ($request->get('query')){
            $query = $request->get('query');
            $data = Post::where("title","LIKE","%$query%")->approved()->published()->get();
            $output = '<ul class="cart-dropdown w-100 rounded-top">';
            foreach ($data as $row){
                $output .= '<li class="single-product-cart p-0" style="cursor: pointer;">'.$row->title.'</li>';
            }
            $output .= '<div class="text-success font-weight-bold">Search Result found : '.$data->count().'</div></ul>';
            echo $output;
        }
    }


    public function contact()
    {
        return view('frontend.contact');
    }


}
