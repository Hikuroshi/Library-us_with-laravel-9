@extends('dashboard.layouts.main')
@section('container')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Buku</h4>
            <div class="table-responsive m-t-40">
                <a href="/dashboard/books/create" class=" btn btn-rounded btn-sm btn-primary">Tambah</a>
                <table id="myTable" class="table table-bordered table-striped">
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
                                <a href="show_siswa.html" data-toggle="tooltip" data-original-title="Lihat"><i class="fa fa-eye text-inverse m-r-10"></i> </a>
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
    </div>
@endsection
