<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $user = Auth::user();
        if ($user->favorites()->where('post_id',$id)->exists()){
            $user->favorites()->detach($id);
            $count = Post::find($id)->favorites->count();
            $notification = new Notification();
            $notification->user_id = Post::find($id)->user->id;
            $notification->post_id = $id;
            $notification->title = 'Your Posts like By -> '.Auth::user()->name;
            $notification->save();
            return response()->json(['success'=>'Post has been unlike successfully','status'=>'remove','count'=> $count]);
        }else{
            $user->favorites()->attach($id);
            $count = Post::find($id)->favorites->count();
            $notification = new Notification();
            $notification->user_id = Post::find($id)->user->id;
            $notification->post_id = $id;
            $notification->title = 'Your Posts Unlike By -> '.Auth::user()->name;
            $notification->save();
            return response()->json(['success'=>'Post has been like successfully','status'=>'add','count'=> $count]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
