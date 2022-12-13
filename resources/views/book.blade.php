@extends('layouts.main')

@section('container')
<section class="section">
    <div class="card p-3">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ asset('storage/' . $book->cover) }}" class="card-img-top" alt="{{ $book->name }}">
            </div>
            <div class="col-md-10">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="col-3">Judul buku</td>
                                <td>: {{ $book->name }}</td>
                            </tr>
                            <tr>
                                <td>Penulis</td>
                                <td>: {{ $book->writer }}</td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>: {{ $book->category->name }}</td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>: {{ $book->description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="table-striped">
    </div>
</section>
<div class="ratio ratio-1x1">
    <embed src="{{ asset('storage/' . $book->books_file) }}#toolbar=0&navpanes=0&scrollbar=0">
    </div>
    @endsection