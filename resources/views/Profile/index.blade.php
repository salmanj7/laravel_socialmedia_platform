@extends('layouts.app')

@section('content')
<div class="container">
    <div style="margin-left: 5%">
    <div class="row">
        
        <div class="col-3 p-5"  style="" >
        
            
                <img src="/storage/{{$user->profile->image??""}}" class="rounded-circle" style=" max-height:100%; max-width:100%; object-fit:" >
            
        </div>
        
        <div class="col-9">
            <div class="pt-5 d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-centre pb-3">
                    <h1>{{$user->name}}</h1>
                    <example-component style="margin-left: 4px" user-id="{{$user->id}}" follows="{{$follows}}"></example-component>
                    
                       
                      
                     
                </div>
                <a href="/post/create">Add New Post</a>
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan
            
            <div class="d-flex">
                <div style="padding-right:20px"><strong>{{$postCount}}</strong> Posts</div>
                <div style="padding-right:20px"><strong>{{$followersCount}}</strong> Followers</div>
                <div style="padding-right:20px"><strong>{{$followingCount}}</strong> Following</div>
            </div>
            <div class="pt-2"><strong>{{$user->profile->title??""}}</strong></div>
            <div>{{$user->profile->bio??""}}</div>
            <div><a href="#">{{$user->profile->url??""}} </a></div>


        </div>  
    </div>
    </div>
    <div class="row" style="margin-top: 2%">
            @foreach($post as $media)
                <div class="col-4 pb-4 " style="">
                    <div class="">
                     <a href="/post/{{$media->id}}"><img src="/storage/{{$media->file}}" class="w-100" style="max-height: 100%; max-width:100%; object-fit: contain"></a>
                    </div>
                </div>
            @endforeach
    </div>
    


</div>



@endsection

