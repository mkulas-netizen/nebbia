@extends('layouts.app')
@section('content')
<div class="container">
    <form method="get" action="{{ route('rssReader.create') }}">
        @csrf
        <button type="submit" class="btn btn-success">Upgrade data</button>
    </form>
    <section class="mt-5">
        <div class="row">
            <div class="col-12 pb-4">
                <h1>RSS READER SLOVENSKO .sk</h1>
                @if(!empty($data) && $data->count())
                    @foreach($data as $item)
                        <div class="comment mt-5 shadow-lg border-dark p-3 text-justify">
                            <div class="clearfix">
                            <div class="float-left">
                                <img
                                src="https://i.imgur.com/CFpa3nK.jpg" alt="" class="rounded-circle" width="40"
                                height="40"><a href="{{ route('rssReader.edit',  $item->id ) }}">Edit</a>
                            </div>
                                <div class="float-right">
                                  @if($item->category != 'Popular')
                                    <img
                                        src="{{ asset('star_black.jpg') }}" data-id="{{ $item->id }}" alt="" class="no-border js-status" width="30"
                                        height="15">
                                    @else
                                        <img
                                            src="{{ asset('star.jpg') }}" data-id="{{ $item->id }}" alt="" class="no-border js-no-status" width="30"
                                            height="30">
                                    @endif
                                </div>
                            </div>
                            <h4><a href="{{ $item->link }}" data-id="{{ $item->id }}" class="js-link" target="_blank"> {{ $item->title }}</a></h4>
                            <h5>{{ $item->description }}</h5>
                            <p class="text-success">{{ $item->read }}</p>
                            <span>- {{ date('j F, Y', strtotime($item->pubDate))   }} </span><br>
                            <div class="btn-group">
                                <p  class="btn btn-outline-dark">Zaujimavé</p>
                                <p  class="btn btn-outline-dark">Nezaujimavé</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            {!! $data->links() !!}
        </div>
    </section>
</div>
@endsection
