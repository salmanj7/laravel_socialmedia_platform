<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        return view('comments.index');
    }
    public function store(Post $post){
        $data=request()->validate([
            'body'=>'required'
        ]);

        auth()->user()->comments()->create([
            'user_id'=>auth()->user()->id,
            'parent_id'=>$post->id,
            'post_id'=>$post->id,
            'body'=>$data['body']
        ]);
        return redirect()->back();
        
    }
}
