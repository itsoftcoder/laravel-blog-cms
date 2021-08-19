<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = User::subscribers()->get();
        return view('admin.subscriber',compact('subscribers'));
    }


    public function destroy($id)
    {
        $subscriber = User::find($id);
        if (empty($subscriber)){
            return back();
        }else{
            $old_image_path = base_path('public/upload/users/'.$subscriber->image);
            if (file_exists($old_image_path)){
                if (unlink($old_image_path)){
                    $subscriber->comments()->delete();
                    $subscriber->favorites()->detach();
                    $subscriber->delete();
                    return back();
                }
            }else{
                $subscriber->comments()->delete();
                $subscriber->favorites()->detach();
                $subscriber->delete();
                return back();
            }
        }
    }
}
