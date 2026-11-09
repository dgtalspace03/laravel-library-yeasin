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
                <tr>
                    <td><strong>The Psychology of Money</strong><div class="muted-small">Morgan Housel</div></td>
                    <td>Personal Growth</td><td>12</td><td>7</td><td>5</td>
                    <td><button class="btn btn-sm btn-outline-primary edit-book">Edit</button></td>
                </tr>
                <tr>
                    <td><strong>Clean Code</strong><div class="muted-small">Robert C. Martin</div></td>
                    <td>Technology</td><td>8</td><td>3</td><td>5</td>
                    <td><button class="btn btn-sm btn-outline-primary edit-book">Edit</button></td>
                </tr>
                <tr>
                    <td><strong>Atomic Habits</strong><div class="muted-small">James Clear</div></td>
                    <td>Personal Growth</td><td>15</td><td>0</td><td>15</td>
                    <td><button class="btn btn-sm btn-outline-primary edit-book">Edit</button></td>
                </tr>
                <tr>
                    <td><strong>The Hobbit</strong><div class="muted-small">J. R. R. Tolkien</div></td>
                    <td>Fiction</td><td>10</td><td>6</td><td>4</td>
                    <td><button class="btn btn-sm btn-outline-primary edit-book">Edit</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
   
@endsection

