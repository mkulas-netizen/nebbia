@extends('layouts.app')
@section('content')
    <div class="container">
        <h4>Edit form</h4>
        <form action="{{ route('rssReader.update',$data->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group mt-5">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp"
                       value="{{ $data->title }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea class="form-control" id="exampleInputPassword1" rows="10"
                          name="description">{{ $data->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
@endsection
