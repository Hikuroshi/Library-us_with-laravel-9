@extends('dashboard.layouts.main')

@section('container')
<div class="page-heading">
    <div class="page-title">
        <h3>Tambah buku</h3>
        <p class="text-subtitle text-muted">Terimakasih sudah berkontribusi^^</p>
    </div>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/dashboard/books/{{ $book->slug }}" method="POST" class="m-t-40" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    
                    <div class="form-group mb-4">
                        <label for="name" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $book->name) }}" required autofocus data-validation-required-message="This field is required">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="writer" class="form-label">Writer <span class="text-danger">*</span></label>
                        <input type="text" name="writer" class="form-control @error('writer') is-invalid @enderror" value="{{ old('writer', $book->writer) }}" required autofocus data-validation-required-message="This field is required">
                        @error('writer')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="category_id" id="category" required class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                @if (old('category_id', $book->category_id) == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror" required placeholder="Deskripsi buku...">{{ old('description', $book->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror                    
                    </div>

                    <div class="form-group mb-4">
                        <label for="cover" class="form-label">Cover <span class="text-danger">*</span></label>
                        <input type="hidden" name="oldCover" value="{{ $book->cover }}">
                        <input type="file" id="cover" accept="image/*" name="cover" class="form-control @error('cover') is-invalid @enderror">
                        @error('cover')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="books_file" class="form-label">Book <span class="text-danger">*</span></label>
                        <input type="hidden" name="oldBook" value="{{ $book->books_file }}">
                        <input type="file" id="books_file" accept="application/pdf" name="books_file" class="form-control @error('books_file') is-invalid @enderror">
                        @error('books_file')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2 mb-1">Submit</button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection