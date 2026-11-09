@extends('layouts.admin')

@section('panel')
    <div class="surface p-3 p-lg-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="h5 fw-bold mb-1">Add a new book</h2>
                <p class="text-secondary small mb-0">Fill in the details below.</p>
            </div>
            <a href="{{ route('admin.books') }}" class="btn btn-outline-secondary">← Back to inventory</a>
        </div>

        <form method="POST" action="{{ route('admin.books.store') }}" enctype="multipart/form-data"
              class="col-lg-8 col-xl-6 p-0">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label fw-semibold">Book title</label>
                <input id="title" name="title" value="{{ old('title') }}"
                       class="form-control @error('title') is-invalid @enderror"
                       placeholder="e.g. The Pragmatic Programmer" required>
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label fw-semibold">Author</label>
                <input id="author" name="author" value="{{ old('author') }}"
                       class="form-control @error('author') is-invalid @enderror"
                       placeholder="Author name" required>
                @error('author') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="row g-3 mb-3">
                <div class="col-7">
                    <label for="category" class="form-label fw-semibold">Category</label>
                    <select id="category" name="category" class="form-select @error('category') is-invalid @enderror">
                        @foreach (['Fiction', 'Personal Growth', 'Technology', 'History', 'Science'] as $cat)
                            <option value="{{ $cat }}" @selected(old('category') === $cat)>{{ $cat }}</option>
                        @endforeach
                    </select>
                    @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-5">
                    <label for="quantity" class="form-label fw-semibold">Total copies</label>
                    <input id="quantity" name="quantity" type="number" min="1" value="{{ old('quantity', 1) }}"
                           class="form-control @error('quantity') is-invalid @enderror" required>
                    @error('quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="thumbnail" class="form-label fw-semibold">Thumbnail</label>
                <input id="thumbnail" name="thumbnail" type="file" accept="image/*"
                       class="form-control @error('thumbnail') is-invalid @enderror">
                @error('thumbnail') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Add book</button>
                <a href="{{ route('admin.books') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection