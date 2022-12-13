@extends('layouts.main')

@section('container')
    <div class="row mb-4">
        <div class="col-md-6 m-auto">
            <form action="/books">
                @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if(request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control" placeholder="Search book" aria-label="Search book" aria-describedby="button-addon2" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Filter</span>
                    </button>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="/books?category={{ $category->slug }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </form>
        </div>
    </div>

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="/img/carousel/library1.jpg" class="d-block w-100" alt="library.jpg">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="/img/carousel/library2.jpg" class="d-block w-100" alt="library.jpg">
            </div>
            <div class="carousel-item">
                <img src="/img/carousel/library3.jpg" class="d-block w-100" alt="library.jpg">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="row row-cols-1 row-cols-md-4 g-4 mt-3">
        @foreach ($books as $book)
            @if ($book->status == 'published')
                <div class="col">
                    <div class="card h-100">
                        <a href="/books/{{ $book->slug }}">
                            <img src="{{ asset('storage/' . $book->cover) }}" class="card-img-top" alt="{{ $book->name }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->name }}</h5>
                            <small class="card-text text-muted">{{ $book->category->name }}</small>
                            <p class="card-text">{{ Str::words($book->description, 30) }}</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection