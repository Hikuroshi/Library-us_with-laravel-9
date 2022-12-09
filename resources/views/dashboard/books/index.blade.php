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
                    <div class="alert alert-success col-lg-8" role="alert">
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
                            <th>Kategori</th>
                            <th>Deskripsi</th>
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
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $book->description }}</td>
                            <td>
                                @foreach ($book->saverUser as $item)
                                - {{ $item->name }} <br>
                                @endforeach
                            </td>
                            <td>
                                <a href="/dashboard/show/{{ $book->slug }}" class="btn icon icon-left"><i data-feather="user"></a>
                                <a href="/dashboard/books/{{ $book->slug }}/edit" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil text-inverse m-r-10"></i></a>
                                <form action="/dashboard/books/{{ $book->slug }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="border-0 bg-transparent" style="cursor: pointer" data-toggle="tooltip" data-original-title="Hapus" onclick="return confirm('Apakah yakin ingin menghapus {{ $book->name }}?')"><i class="fa fa-close text-danger"></i></button>
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
