@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Siswa</h4>
                    <form action="/dashboard/books/{{ $book->slug }}" method="POST" class="m-t-40" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="form-group">
                            <h5>Judul <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $book->name) }}" required data-validation-required-message="This field is required">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Kategori<span class="text-danger">*</span></h5>
                            <div class="controls">
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
                        </div>

                        <div class="form-group">
                            <h5>Deskripsi <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required placeholder="Deskripsi buku...">{{ old('description', $book->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Cover buku <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="hidden" name="oldCover" value="{{ $book->cover }}">
                                <input type="file" accept="image/*" name="cover" class="form-control @error('cover') is-invalid @enderror">
                                @error('cover')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Isi buku <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="hidden" name="oldBook" value="{{ $book->books_file }}">
                                <input type="file" accept="application/pdf" name="books_file" class="form-control @error('books_file') is-invalid @enderror">
                                @error('books_file')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-sm btn-info">Submit</button>
                            <button type="reset" class="btn btn-sm btn-inverse">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection