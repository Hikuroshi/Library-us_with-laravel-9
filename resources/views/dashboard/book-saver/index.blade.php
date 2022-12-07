@extends('dashboard.layouts.main')

@section('container')
<div class="card">
    <div class="card-body">
        <h3 class="card-title">The Books you have saved are here</h3>
        <p class="card-text">
            When you read a book and haven't finished reading it then you need a place to store the book somewhere safe so that the book doesn't disappear and it's easier to find it next time. Therefore we provide a place to store books that you want to read again later or to save books that you like.
        </p>
    </div>
</div>
<div class="card">
    <div class="card-body">
        @foreach ($myBook[0]->saverBook as $item)
        <a href="/books/{{ $item->slug }}">
            <div class="row no-gutters">
                <div class="col-md-2">
                    <img src="{{ asset('storage/' . $item->cover) }}" class="card-img" alt="{{ $item->name }}">
                </div>
                <div class="col-md-10">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text"><small class="text-muted">{{ $item->category->name }}</small></p>
                        <p class="card-text">{{ $item->description }}</p>
                    </div>
                </div>
            </div>
        </a>
        <hr>
        @endforeach
    </div>
</div>
@endsection