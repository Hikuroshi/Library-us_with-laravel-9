@extends('dashboard.layouts.main')

@section('container')
<div class="page-heading">
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-6">
                <h3>Status Buku</h3>
                <p class="text-subtitle text-muted">Silahkan tinjau daftar buku yang akan dipublikasikan</p>
            </div>
            <div class="col-md-6">
                @if(session()->has('success'))
                    <div class="alert alert-light-success col-lg-8" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item mb-4" role="presentation">
                <a class="nav-link active" id="published-tab" data-bs-toggle="tab" href="#published" role="tab" aria-controls="published" aria-selected="true">Published</a>
            </li>
            <li class="nav-item mb-4" role="presentation">
                <a class="nav-link" id="pending-review-tab" data-bs-toggle="tab" href="#pending-review" role="tab" aria-controls="pending-review" aria-selected="false">Pending Review</a>
            </li>
            <li class="nav-item mb-4" role="presentation">
                <a class="nav-link" id="rejected-tab" data-bs-toggle="tab" href="#rejected" role="tab" aria-controls="rejected" aria-selected="false">Rejected</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="published" role="tabpanel" aria-labelledby="published-tab">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th class="col-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            @if ($book->status == 'published')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="/dashboard/status-book/{{ $book->slug }}">{{ $book->name }}</a>
                                    </td>
                                    <td>
                                        @if ($book->status == 'published')
                                            <span class="badge bg-success">{{ $book->status }}</span>
                                        @elseif ($book->status == 'pending-review')
                                            <span class="badge bg-warning">{{ $book->status }}</span>
                                        @elseif ($book->status == 'rejected')
                                            <span class="badge bg-danger">{{ $book->status }}</span>
                                        @endif
                                    </td>
                                    <td>
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
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="pending-review" role="tabpanel" aria-labelledby="pending-review-tab">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th class="col-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            @if ($book->status == 'pending-review')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="/dashboard/status-book/{{ $book->slug }}">{{ $book->name }}</a>
                                    </td>
                                    <td>
                                        @if ($book->status == 'published')
                                            <span class="badge bg-success">{{ $book->status }}</span>
                                        @elseif ($book->status == 'pending-review')
                                            <span class="badge bg-warning">{{ $book->status }}</span>
                                        @elseif ($book->status == 'rejected')
                                            <span class="badge bg-danger">{{ $book->status }}</span>
                                        @endif
                                    </td>
                                    <td>
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
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th class="col-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            @if ($book->status == 'rejected')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="/dashboard/status-book/{{ $book->slug }}">{{ $book->name }}</a>
                                    </td>
                                    <td>
                                        @if ($book->status == 'published')
                                            <span class="badge bg-success">{{ $book->status }}</span>
                                        @elseif ($book->status == 'pending-review')
                                            <span class="badge bg-warning">{{ $book->status }}</span>
                                        @elseif ($book->status == 'rejected')
                                            <span class="badge bg-danger">{{ $book->status }}</span>
                                        @endif
                                    </td>
                                    <td>
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
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection