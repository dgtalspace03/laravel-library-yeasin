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

        <form class="row g-2 mb-3" action="#catalog">
            <div class="col-md">
                <input value="{{ $search }}" class="form-control admin-search" name="search" placeholder="Search books...">
            </div>
            <div class="col-sm-4 col-md-2">
                <select class="form-select" name="category">
                   @foreach (config('constants.book_categories') as $l_category )
                    <option @selected($category==$l_category) value="{{ $l_category }}">{{$l_category}}</option>
                   @endforeach
                </select>
            </div>
            <div class="col-sm-4 col-md-2">
                <select class="form-select" name="stock">
                    @foreach (config('constants.stocks_list') as $st_item)
                     <option @selected($stock==$st_item) value="{{ $st_item }}">{{$st_item}}</option>   
                    @endforeach
                </select>
            </div>
            <button type="submit" class="col-sm-3 col-md-1 btn btn-primary">Filter</button>
        </form>

        <div class="table-responsive" id="catalog">
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
