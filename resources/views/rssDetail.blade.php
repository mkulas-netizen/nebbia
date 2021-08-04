@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="post" action="{{ route('update' , $rss->id) }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" name="title" id="exampleInputEmail1" value="{{ $rss->title }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <textarea type="text" name="content" class="form-control" id="exampleInputPassword1" rows="10"> {{ $rss->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit my post</button>
        </form>
    </div>

@endsection
