@extends('dashboard.layouts.main')

@section('container')
<div class="page-heading">
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-4">
                <h3>Daftar buku</h3>
                <p class="text-subtitle text-muted">Terimakasih sudah berkontribusi^^</p>
            </div>
            <div class="col-md-6">
                @if(session()->has('success'))
                    <div class="alert alert-light-success col-lg-8" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="col-md-2 text-end">
                <a href="/dashboard/books/create" class="btn btn-primary mb-3 shadow-sm"><i class="bi bi-plus-circle"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Cover</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img class="img-fluid rounded-3" style="max-width: 100px;" src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->name }}">
                            </td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->writer }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>
                                <a href="/dashboard/books/{{ $book->slug }}" class="btn btn-primary btn-sm rounded-circle"><i class="bi bi-eye"></i></a>
                                <a href="/dashboard/books/{{ $book->slug }}/edit" class="btn btn-warning btn-sm rounded-circle"><i class="bi bi-pencil-square"></i></a>
                                <form action="/dashboard/books/{{ $book->slug }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm rounded-circle" onclick="return confirm('Apakah yakin ingin menghapus {{ $book->name }}?')"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
