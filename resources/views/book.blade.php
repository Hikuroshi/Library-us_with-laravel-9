@extends('layouts.main')

@section('container')
<div class="container">
    <div class="ratio ratio-1x1">
        <embed src="{{ asset('storage/' . $book->books_file) }}#toolbar=0&navpanes=0&scrollbar=0">
    </div>
</div>
@endsection