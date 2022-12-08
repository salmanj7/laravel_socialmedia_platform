@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$postmedia->file}}" class="w-100">
        </div>
        <div class="col-4">
           <h3> {{$postmedia->post->user->name}} </h3>
           <p> {{$postmedia->post->caption}}</p>
           <p>  <a href="#">Like </a>
                <a href="/post/{{$postmedia->post->id}}/comments" style="margin-left: 10px">Comment</a>
           </p>
           <form action="" enctype="multipart/form-data" method="post">
            @csrf
            
    
            <div class="row">
                <div class="col-8 offset-2">
    
                   
                    <div class="form-group row">
                        
    
                        <input id="body"
                               type="text"
                               class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}"
                               name="body"
                               value=""
                               autocomplete="body" autofocus>
    
                        @if ($errors->has('body'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    
    
                    <div class="row pt-2">
                        <button class="btn btn-primary">Comment</button>
                    </div>
    
                </div>
            </div>
        </form>
        <div class="row">
            @foreach($comments as $comment)

                <div class="row mt-4" style="border-style: outset">
                <h4 class="">{{$comment->user->username}}</h4>
                  <p>  {{$comment->body}} </p>  
                  <p class=""> {{$comment->created_at->diffForHumans()}}</p>
                    @if (Auth::check())
                    @if(count((array)$comments) > 0)
                    @if($comment->user->id == Auth::user()->id)
                    <button class="btn btn-primary" style="width:40px; font-size:11px; text-align:center; max-height:10px">Edit </button>
                    @endif
                    @endif
                    @endif
                  
                </div>

                
            @endforeach
            
        </div>
        </div>
    </div>

</div>
@endsection
