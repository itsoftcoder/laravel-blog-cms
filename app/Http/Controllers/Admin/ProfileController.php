<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Image;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = $user->posts()->paginate(10);
        $comments = $user->comments()->paginate(5);
        $favorites = $user->favorites()->paginate(5);
        return view('admin.profile.index',compact('user','posts','comments','favorites'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required | unique:users,name,$id",
            "email" => "required | email | unique:users,email,$id",
            "image" => "nullable | image | max:1000",
            "about" => "nullable"
        ]);
        $username = Str::slug($request->name);
        $slug = Str::uuid();
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $username;
        if (!empty($request->about)){
            $user->about = $request->about;
        }
        if ($request->hasFile('image')){
            $old_image_path = base_path('public/upload/users/'.$user->profie_photo_path);
            if (file_exists($old_image_path)){
                if (unlink($old_image_path)){
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $file_name = $slug.'.'.$extension;
                    $destination = base_path('public/upload/users/'.$file_name);
                    Image::make($file)->resize(256,256)->save($destination);
                    $user->profile_photo_path = $file_name;
                }
            }else{
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $file_name = $slug.'.'.$extension;
                $destination = base_path('public/upload/users/'.$file_name);
                Image::make($file)->resize(256,256)->save($destination);
                $user->profile_photo_path = $file_name;
            }
        }

        if ($user->update()){
            return back();
        }else{
            return back()->withInput();
        }
    }

    public function setting()
    {
        $user = Auth::user();
        return view('admin.profile.setting',compact('user'));
    }


    public function change(Request $request,$id)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $user = User::findOrFail($id);

        $hash_password = $user->password;
        if (Hash::check($request->old_password,$hash_password)){
            if (!Hash::check($request->password,$hash_password)){
                $user->password = Hash::make($request->password);
                if ($user->update()){
                    Auth::logout();
                    return redirect()->back();
                }else{
                    return back()->withInput();
                }
            }else{
                return back()->withInput();
            }
        }else{
            return back()->withInput();
        }
    }


    public function commentDelete($id)
    {

        $comment = Comment::findOrFail($id);
        if ($comment->delete()){
            return back();
        }
    }


    public function favoriteDelete($id)
    {
        $post = Post::findOrFail($id);
        if ($post->favorites()->detach()){
            return back();
        }

    }
}
