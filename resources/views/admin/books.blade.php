@extends('layouts.admin')

@section('panel')
    <div class="surface p-3 p-lg-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
            <div>
                <h2 class="h5 fw-bold mb-1">Book inventory</h2>
                <p class="text-secondary small mb-0">Add books and update available quantities.</p>
            </div>
            <a href="{{ route('admin.books.create') }}" class="btn btn-primary">
                ＋ Add new book
            </a>
        </div>

        <div class="row g-2 mb-3">
            <div class="col-md">
                <input class="form-control admin-search" placeholder="Search books...">
            </div>
            <div class="col-sm-6 col-md-3">
                <select class="form-select">
                    <option>All categories</option>
                    <option>Fiction</option>
                    <option>Technology</option>
                </select>
            </div>
            <div class="col-sm-6 col-md-3">
                <select class="form-select">
                    <option>All stock</option>
                    <option>In stock</option>
                    <option>Out of stock</option>
                </select>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Book</th>
                        <th>Category</th>
                        <th>Total copies</th>
                        <th>Available</th>
                        <th>Borrowed</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="adminBookRows">
                    @foreach ($books as $book)
                        <tr>
                            <td><strong>{{ $book->title }}</strong>
                                <div class="muted-small">{{ $book->author_name }}</div>
                            </td>
                            <td>{{ $book->category }}</td>
                            <td>{{ $book->total_copies }}</td>
                            <td>{{ $book->available_copies }}</td>
                            <td>{{ $book->total_copies - $book->available_copies }}</td>
                            <td><a href="{{ route('admin.books.edit',$book->id) }}" class="btn btn-sm btn-outline-primary edit-book">Edit</a></td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
