<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class NativeController extends Controller
{
    public function index()
    {
        $natives = User::natives()->get();
        return view('admin.native',compact('natives'));
    }


    public function destroy($id)
    {
        $native = User::find($id);
        if (empty($native)){
            return back();
        }else{
            $old_image_path = base_path('public/upload/users/'.$native->image);
            if (file_exists($old_image_path)){
                if (unlink($old_image_path)){
                    $native->comments()->delete();
                    $native->favorites()->detach();
                    $native->delete();
                    return back();
                }
            }else{
                $native->comments()->delete();
                $native->favorites()->detach();
                $native->delete();
                return back();
            }

        }
    }
}
