
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

    
        
        <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')
    
            <div class="row">
                <div class="col-8 offset-2">
    
                    <div class="row">
                        <h1>Update Profile</h1>
                    </div>
                    <div class="form-group row">
                        <label for="phone_number" class="col-md-4 col-form-label"> Phone Number</label>
    
                        <input id="phone_number"
                               type="text"
                               class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                               name="phone_number"
                               value="{{ $user->profile->phone_number ?? old('phone_number') }}"
                               autocomplete="phone_number" autofocus>
    
                        @if ($errors->has('phone_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label">Title</label>
    
                        <input id="title"
                               type="text"
                               class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                               name="title"
                               value="{{ old('title')?? $user->profile->title }}"
                               autocomplete="title" autofocus>
    
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label for="bio" class="col-md-4 col-form-label">Profile Bio</label>
    
                        <input id="bio"
                               type="text"
                               class="form-control{{ $errors->has('bio') ? ' is-invalid' : '' }}"
                               name="bio"
                               value="{{ old('bio')?? $user->profile->bio }}"
                               autocomplete="bio autofocus>
    
                        @if ($errors->has('bio'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bio') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group row">
                        <label for="url" class="col-md-4 col-form-label">Post url</label>
    
                        <input id="url"
                               type="text"
                               class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}"
                               name="url"
                               value="{{ old('url')?? $user->profile->url }}"
                               autocomplete="url" autofocus>
    
                        @if ($errors->has('url'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('url') }}</strong>
                            </span>
                        @endif
                    </div>
    
                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label">Post Image</label>
    
                        <input type="file" class="form-control-file" id="image" name="image">
    
                        @if ($errors->has('image'))
                            <strong>{{ $errors->first('image') }}</strong>
                        @endif
                    </div>
    
                    <div class="row pt-4">
                        <button class="btn btn-primary">Save Profile</button>
                    </div>
    
                </div>
            </div>
        </form>
</div>

        
            
   

