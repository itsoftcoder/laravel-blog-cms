<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    public function pending()
    {
        $posts = Post::where('is_approved',0)->get();
        return view('admin.posts.index',compact('posts'));
    }

    public function approve($id)
    {
        $post = Post::findOrFail($id);
        $post->is_approved = 1;
        $post->update();
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required | image',
            'body' => 'required',
            'categories' => 'required',
            'tags' => 'required'
        ]);

        $slug = Str::uuid();

        $post = new Post();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->user_id = Auth::id();
        $post->is_approved = 1;
        $post->body = $request->body;

        if (isset($request->publish)){
            $post->status = $request->publish;
        }else{
            $post->status = 0;
        }

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = $slug.'.'.$extension;

            $destination = base_path('public/upload/posts/'.$file_name);
            Image::make($file)->resize(1080,720)->save($destination);
            $post->image = $file_name;
        }else{
            $post->image = 'default.png';
        }

        if ($post->save()){
            $post->categories()->attach($request->categories);
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.post.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        $post->notifications()->update(['status' => 1]);
        return view('admin.posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::whereSlug($slug)->first();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit',compact('categories','tags','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable | image',
            'body' => 'required',
            'categories' => 'required',
            'tags' => 'required'
        ]);

        $post = Post::whereSlug($slug)->first();
        $post->title = $request->title;
        $post->is_approved = 1;
        $post->body = $request->body;

        if (isset($request->publish)){
            $post->status = $request->publish;
        }else{
            $post->status = 0;
        }

        if ($request->hasFile('image')){
            $old_image_path = base_path('public/upload/posts/'.$post->image);
            if (file_exists($old_image_path)){
                if (unlink($old_image_path)){
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $file_name = $slug.'.'.$extension;
                    $destination = base_path('public/upload/posts/'.$file_name);
                    Image::make($file)->resize(1080,720)->save($destination);
                    $post->image = $file_name;
                }
            }
        }

        if ($post->update()){
            $post->categories()->sync($request->categories);
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('admin.post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $old_image_path = base_path('public/upload/posts/'.$post->image);
        if (file_exists($old_image_path)){
            if (unlink($old_image_path)){
                $post->categories()->detach();
                $post->tags()->detach();
                $post->favorites()->detach();
                $post->comments()->delete();
                $post->notifications()->delete();
                $post->delete();
                return redirect()->route('admin.post.index');
            }
        }else{
            return back();
        }
    }

}
