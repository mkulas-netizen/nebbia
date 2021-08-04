<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Nebbia</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">My posts</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
            <a class="text-sm text-gray-700 underline ml-4" href="{{ url('posts.rss') }}">{{ __('app.rss') }}</a>
            <a class="text-sm text-gray-700 underline ml-4" href="{{ url('rssReader') }}">{{ __('app.rssS') }}</a>
        </div>
    @endif
    <div class="container">
        <section class="mt-5">

            <div class="row">
                <div class="col-12 pb-4">
                    <h1>All myposts</h1>
                    @if(!empty($posts) && $posts->count())
                        @foreach($posts  as $post)
                            <div class="comment mt-5 shadow-lg border-dark p-3 text-justify"><img
                                    src="https://i.imgur.com/CFpa3nK.jpg" alt="" class="rounded-circle" width="40"
                                    height="40">
                                <h4>{{ $post->user->name }}</h4>
                                <h5>{{ $post->title }}</h5>
                                <p>{{$post->content  }}</p>
                                <span>- {{ $post->created_at->format('j F, Y') }}</span>
                            </div>
                        @endforeach
                    @endif
                </div>
                {!! $posts->links() !!}
            </div>
        </section>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
