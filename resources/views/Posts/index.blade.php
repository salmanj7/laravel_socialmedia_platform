@extends('layouts.app')

@section('content')

<div class="container">
    <h1> </h1>
    @foreach($posts as $post)
    <div class="row">
        <div class="col-8 offset-2">
            <a href="/post/{{$post->post->id}}">
                
                <img src="/storage/{{$post->file}}" class="w-100">
            </a>
        </div>
    </div>
    <div class="row pt-2 pb-4">

            <div class="col-8 offset-2">
                <div>
                    <p>
                        <span class="font-weight-bold">
                            <a href="/profile/{{$post->post->user->id}}">
                                <span class="text-dark font-weight-bold">{{$post->post->user->name}}</span>
                            </a>
                        </span>
                        {{$post->post->caption}}
                    </p>
                </div>
        
        </div>
    </div>
    @endforeach
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div style="max-height: 20px">
                {{$posts->links()}}
                </div>
            </div>

        </div>
    

</div>
@endsection
