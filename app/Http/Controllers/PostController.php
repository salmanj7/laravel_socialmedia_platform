<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostMedia;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{   public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $users=auth()->user()->following()->pluck('profiles.user_id');
        $postids=Post::where('user_id',auth()->user()->id)->orWhereIn('user_id',$users)->pluck('id');
        $posts=PostMedia::whereIn('post_id',$postids)->with('post')->orderBy('created_at','DESC')->paginate(5);
        $posts->load('post.user');
       return view('posts.index',compact('posts'));

    }





    public function create(){
        return view('posts.create');
    }
    public function store(Request $request){
        
        $data=$request->validate([
            'user_id'=>'',
            'post_type'=>'',
            'caption' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $imagePath= request('file')->store('uploads','public');
        
        $image=Image::make(public_path("storage/{$imagePath}"))->fit(500,500)->save();
        
        
        
       
        $user=auth()->user();
        $post=auth()->user()->posts()->create([
            'user_id'=>$user->id,
            
            'caption'=>$data['caption'],
            
        ]);
        //$file=Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        //$file->save();
        $postmedia=$post->postMedia()->create([
            'post_id'=>$post->id,
            'post_type'=>'image',
            'file'=>$imagePath,
        ]);
      
        
        
        /*$post=Post::create([
            'caption'=>$data['caption'],
            'user_id'=>auth()->user()->id,
            
        ]);
        $post->postMedia()->create([
            
            
            'file'=>$request->hasFile('file')? $request->file('file')->store('image', 'public'): $request->file,
            'post_type'=>$request->hasFile('file')?'image':'text',
            
           
        ]);*/
        return redirect('profile/'.auth()->user()->id);
        

    }

    public function show(PostMedia $postmedia){

        
        $comments=Comment::where('post_id',$postmedia->id)->get();

        
        return view('posts.show',compact('postmedia','comments'));

    }
}
