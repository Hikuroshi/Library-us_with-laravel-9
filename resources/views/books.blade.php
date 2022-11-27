@extends('layouts.main')

@section('container')
<div class="container mt-4">
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
                    <input class="form-control shadow-sm" type="search" placeholder="Search" name="search" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-danger">Search</button>
                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
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
    <div class="row gx-5 gy-3">
        @if ($books->count())
            @foreach ($books as $book)
            <div class="col-md-6">
                <div class="card border mb-3 shadow">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $book->cover) }}" class="img-fluid rounded-start" alt="{{ $book->name }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $book->name }}</h5>
                                <p class="card-text text-muted m-0">Category: {{ $book->category->name }}</p>
                                <p class="card-text text-muted m-0">Description: {{ $book->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
        <h4 class="d-flex justify-content-center fw-bold" style="margin: 20vh 0 20vh 0;">Books not found</h4>
        @endif
    </div>
    <div class="d-flex justify-content-end">
        {{ $books->links() }}
    </div>
</div>
@endsection