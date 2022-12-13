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
                            <tr>
                                <td>Status</td>
                                <td>: 
                                    @if ($book->status == 'published')
                                        <span class="badge bg-success">{{ $book->status }}</span>
                                    @elseif ($book->status == 'pending-review')
                                        <span class="badge bg-warning">{{ $book->status }}</span>
                                    @elseif ($book->status == 'rejected')
                                        <span class="badge bg-danger">{{ $book->status }}</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <form action="/dashboard/status-book/{{ $book->slug }}" method="post" class="d-inline">
                                        @csrf
                                        @method('put')
                                        <select name="status" id="status" class="form-control" onchange="this.form.submit()">
                                            <option>Select Status</option>
                                            <option value="published">Published</option>
                                            <option value="pending-review">Pending Review</option>
                                            <option value="rejected">Rejected</option>
                                        </select>
                                    </form>
                                </td>
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