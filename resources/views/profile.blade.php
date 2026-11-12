@extends('layouts.app')

@section('content')
    <main class="container py-4 py-lg-5 ">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h1 class="h2 fw-bold mb-1">My library</h1>
                <p class="text-secondary mb-0">
                    Your reading, all in one place.
                </p>
            </div>
            
        </div>
        <div class="row g-4">
            <aside class="col-lg-3">
                <div class="surface p-4 text-center h-100">
                    <div class="profile-avatar mb-3">YA</div>
                    <h2 class="h5 fw-bold mb-1">{{ $user->name }}</h2>
                    <p class="text-secondary small">
                        {{ $user->email }}
                    </p>
                    <span
                        class="badge bg-{{ $user->status == 'active' ? 'success' : 'danger' }} rounded-pill px-3 py-2">{{ ucfirst($user->status) }}
                        member</span>
                    <hr class="my-4" />
                    <div class="text-start small text-secondary">
                        <p>
                            📚
                            <strong class="text-dark">Member since</strong><br /><span
                                class="ms-4">{{ $user->created_at->format('F j Y') }}</span>
                        </p>

                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary w-100 mt-2">Sign out
                        </button>
                    </form>
                </div>
            </aside>
            <section class="col-lg-9">

                <div class="row g-3 mb-4">
                    <div class="col-sm-4">
                        <div class="stat-card">
                            <div class="stat-label">Total borrowed</div>
                            <div class="stat-number text-success"> {{ $active_borrow->count() + $returned_book->count() }}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="stat-card">
                            <div class="stat-label">Currently borrowed</div>
                            <div class="stat-number">{{ $active_borrow->count() }}</div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="stat-card">
                            <div class="stat-label">Books returned</div>
                            <div class="stat-number">{{$returned_book->count() }}</div>
                        </div>
                    </div>

                </div>
                <div class="surface p-3 p-lg-4 mb-4">
                    <div class="mb-3">
                        <h2 class="h5 fw-bold mb-1">Currently borrowed</h2>
                        <p class="text-secondary small mb-0">
                            Remember to return books by their due date.
                        </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Book</th>
                                    <th>Borrowed</th>
                                    <th>Due date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($active_borrow as $borrow)
                                    @php
                                        $due = $borrow->borrowed_at->copy()->addDays(7);
                                    @endphp
                                    <tr>
                                        <td>
                                            <strong>{{ $borrow->book->title }}</strong>
                                            <div class="muted-small">
                                                {{ $borrow->book->author_name }}
                                            </div>
                                        </td>
                                        <td>{{ $borrow->borrowed_at->format('d M Y') }}</td>
                                        <td>{{ $due->format('d M Y') }}</td>
                                        <td>
                                            @if (!$due->isPast())
                                                <span class="badge bg-success px-3 py-1">{{ $borrow->due_at->diffForHumans() }}</span>
                                            @else
                                                <span class="badge bg-danger">Due</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('return-book', $borrow->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-primary return-btn">
                                                    Return book
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($active_borrow->count() == 0)
                                    <tr>
                                        <td colspan="5">
                                            <h2 class=" text-center my-5 text-xl">No Active Borrows Found</h2>
                                        </td>
                                    </tr>
                                @endif

                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="surface p-3 p-lg-4">
                    <div class="mb-3">
                        <h2 class="h5 fw-bold mb-1">Borrowing history</h2>
                        <p class="text-secondary small mb-0">
                            Books you've returned in the past.
                        </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Book</th>
                                    <th>Borrowed on</th>
                                    <th>Returned on</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($returned_book as $borrow)
                                    @php
                                        $due = $borrow->borrowed_at->copy()->addDays(7);
                                    @endphp
                                    <tr>
                                    <tr>
                                        <td>
                                            <strong>{{ $borrow->book->title }}</strong>
                                            <div class="muted-small">
                                                {{ $borrow->book->author_name }}
                                            </div>
                                        </td>
                                        <td>{{ $borrow->borrowed_at->format('d M Y') }}</td>
                                        <td>{{ $borrow->returned_at->format('d M Y') }}</td>
                                        <td>
                                            <span
                                                class="badge bg-{{ $due->isAfter($borrow->returned_at) ? 'success' : 'danger' }}">
                                                {{ $due->isAfter($borrow->returned_at) ? 'On Time' : 'Due' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($returned_book->count() == 0)
                                    <tr>
                                        <td colspan="5">
                                            <h2 class=" text-center my-5 text-xl">No book has been returned yet</h2>
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>

                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
