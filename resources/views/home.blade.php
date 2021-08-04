@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-md-6 col-12 pb-4">
                    <h1>My posts</h1>
                    @if(!empty($posts) && $posts->count())
                        @foreach($posts as $post)
                            <div class="comment mt-5 shadow-lg border-dark p-3 text-justify float-left">

                                <div class="clearfix">
                                    <div class="float-left">
                                        <img
                                            src="https://i.imgur.com/CFpa3nK.jpg" alt="" class="rounded-circle" width="40"
                                            height="40">
                                        <a href="{{ route('edit',$post->id) }}">Edit</a>
                                    </div>
                                    <div class="float-right">
                                        <form method="post" action="{{ route('delete',['id' => $post->id])  }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>

                                <h4>{{ $post->user->name }}</h4>
                                <h5>{{$post->title }}</h5>
                                <p>{{$post->content}}</p>
                                <div class="btn-group w-100 mt-2">
                                    <a href="{{ url('posts',['id' => $post->id])}}" class="btn btn-secondary">Get
                                        JSON</a>
                                </div>
                                <br><br>
                                <span>- {{ $post->created_at->format('j F, Y') }}</span>
                            </div>
                        @endforeach
                    @else
                        <p>No post bro . Create new post -></p>
                    @endif
                </div>
                <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                    <form id="algin-form" action="{{ route('posts') }}" method="post">
                        @csrf
                        <h4>Create post</h4>
                        <div class="form-group"><label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control  @error('content') is-invalid @enderror">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" cols="30" rows="5" class="form-control @error('content') is-invalid @enderror"></textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" id="post" class="btn btn-success">New post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
