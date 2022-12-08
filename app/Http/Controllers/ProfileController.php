<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostMedia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

use function Termwind\render;

class ProfileController extends Controller
{   



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {   
        //$user=User::where('id', $user->id)->first();
        //$user=$users->pluck('id');

        
        //$user=User::find(auth()->user()->id);
        
        //$post=Post::where('user_id',auth()->user()->id)->get();
        
        $follows=(auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        
        $post=PostMedia::whereIn('post_id',$user->posts->pluck('id')->toArray())->orderBy('created_at','desc')->get();
        $postCount=Cache::remember('count.posts.' . $user->id, now()->addSeconds(30), function () use ($user) {
            return $user->posts->count();
        });
        $followersCount=Cache::remember('count.followers.' . $user->id, now()->addSeconds(3), function () use ($user) {
            return $user->profile->followers->count();
        });
        $followingCount=Cache::remember('count.following.' . $user->id, now()->addSeconds(30), function () use ($user) {
            return $user->following->count();
        });
        
        
        
        
        
        
        
        
        
        return view('profile.index',compact('user','post','follows','postCount','followersCount','followingCount'));
    }


    public function edit(User $user){
        $this->authorize('update',$user->profile);
        return view('profile.edit',compact('user'));
        
    }

    public function update(User $user){
        
        $data=request()->validate([
            'phone_number' => '',
            'title'=>'',
            'bio'=>'',
            'url'=>'',
            'image'=>'',
        ]);
        if(request('image')){
            $imagePath= request('image')->store('profile','public');
            //$image=Image::make(public_path("storage/{$imagePath}"))->fit(500,500)->save();
            $imagearray=['image'=>$imagePath];
            
        }
        
        

        


        auth()->user()->profile->update(array_merge(
            $data,
            $imagearray?? [],
        ));

        return redirect('profile/'.auth()->user()->id);
        
    }
    
}
