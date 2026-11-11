@extends('layouts.admin')

@section('panel')
    <div class="surface p-3 p-lg-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
            <div>
                <h2 class="h5 fw-bold mb-1">Borrowed books</h2>
                <p class="text-secondary small mb-0">Monitor current loans and who has each book.</p>
            </div>
            <select class="form-select w-auto">
                <option>All loan statuses</option>
                <option>On time</option>
                <option>Overdue</option>
            </select>
        </div>

        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Book</th>
                        <th>Borrower</th>
                        <th>Borrowed</th>
                        <th>Due date</th>
                        <th>Return date</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrow_books as $borrow)
                        @php
                            $due = $borrow->borrowed_at->copy()->addDays(7);
                            $isReturned=$borrow->returned_at!=null;
                        @endphp
                        <tr>
                        <tr>
                            <td><strong>{{ $borrow->book->title }}</strong></td>
                            <td><strong>{{ $borrow->user->name }}</strong>
                                <div class="muted-small">{{ $borrow->user->email }}</div>
                            </td>
                            <td>{{ $borrow->borrowed_at->format('d M Y') }}</td>
                            <td> {{ $due->format('d M Y') }} </td>
                            <td> {{ $isReturned ? $borrow->returned_at->format('d M Y') : "Unavailable" }} </td>
                            <td>
                               @if(!$isReturned)
                                     <span class="badge bg-warning ">Not Returned</span>
                                @elseif($due->isAfter($borrow->returned_at))
                                 <span class="badge bg-success">On time</span>
                                @else
                                 <span class="badge bg-danger">Due</span>
                                @endif
                            </td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
