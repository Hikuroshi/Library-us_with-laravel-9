@extends('dashboard.layouts.main')

@section('container')
<div class="page-heading">
    <div class="page-title">
        <h3>Detail buku</h3>
        <p class="text-subtitle text-muted">Ini detail dari buku yang udah kamu tambahin</p>
    </div>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="ratio ratio-1x1">
                    <embed src="{{ asset('storage/' . $book->books_file) }}#toolbar=0&navpanes=0&scrollbar=0">
                </div>
            </div>
        </div>
    </section>
</div>
@endsection