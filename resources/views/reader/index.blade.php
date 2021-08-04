@extends('layouts.app')
@section('content')
<div class="container">
    <section class="mt-5">
        <div class="row">
            <div class="col-12 pb-4">
                <h1>RSS READER SLOVENSKO .sk</h1>
                @if(!empty($data) && $data->count())
                    @foreach($data as $item)
                        <div class="comment mt-5 shadow-lg border-dark p-3 text-justify"><img
                                src="https://i.imgur.com/CFpa3nK.jpg" alt="" class="rounded-circle" width="40"
                                height="40">
                            <h4><a href="{{ $item->link }}" target="_blank"> {{ $item->title }}</a></h4>
                            <h5>{{ $item->description }}</h5>
                            <span>- {{ date('j F, Y', strtotime($item->pubDate))   }} </span>
                        </div>
                    @endforeach
                @endif
            </div>
            {!! $data->links() !!}
        </div>
    </section>
</div>
@endsection
