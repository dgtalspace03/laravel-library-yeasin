@extends('layouts.app')

@section('content')
   
        <main = class="container py-4 py-lg-5 ">
            <div
                class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4"
            >
                <div>
                    <h1 class="h2 fw-bold mb-1">My library</h1>
                    <p class="text-secondary mb-0">
                        Your reading, all in one place.
                    </p>
                </div>
                <a class="btn btn-primary" href="#home">Discover more books</a>
            </div>
            <div class="row g-4">
                <aside class="col-lg-3">
                    <div class="surface p-4 text-center h-100">
                        <div class="profile-avatar mb-3">YA</div>
                        <h2 class="h5 fw-bold mb-1">{{$user->name}}</h2>
                        <p class="text-secondary small">
                             {{ $user->email }}
                        </p>
                        <span
                            class="badge bg-{{ $user->status=='active' ? 'success' : 'danger' }} rounded-pill px-3 py-2"
                            >{{ ucfirst($user->status) }} member</span
                        >
                        <hr class="my-4" />
                        <div class="text-start small text-secondary">
                            <p>
                                📚
                                <strong class="text-dark">Member since</strong
                                ><br /><span class="ms-4">{{$user->created_at->format('F j Y')}}</span>
                            </p>
                            
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button
                            type="submit"
                            class="btn btn-outline-secondary w-100 mt-2"
                            >Sign out
                        </button>
                        </form>
                    </div>
                </aside>
                <section class="col-lg-9">
                    <div class="row g-3 mb-4">
                        <div class="col-sm-4">
                            <div class="stat-card">
                                <div class="stat-label">Currently borrowed</div>
                                <div class="stat-number">2</div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stat-card">
                                <div class="stat-label">Books returned</div>
                                <div class="stat-number">8</div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="stat-card">
                                <div class="stat-label">Overdue books</div>
                                <div class="stat-number text-success">0</div>
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
                                    <tr>
                                        <td>
                                            <strong
                                                >The Psychology of Money</strong
                                            >
                                            <div class="muted-small">
                                                Morgan Housel
                                            </div>
                                        </td>
                                        <td>Oct 20, 2026</td>
                                        <td>Nov 03, 2026</td>
                                        <td>
                                            <span class="badge badge-available"
                                                >On time</span
                                            >
                                        </td>
                                        <td>
                                            <button
                                                class="btn btn-sm btn-outline-primary return-btn"
                                            >
                                                Return book
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Clean Code</strong>
                                            <div class="muted-small">
                                                Robert C. Martin
                                            </div>
                                        </td>
                                        <td>Oct 23, 2026</td>
                                        <td>Nov 06, 2026</td>
                                        <td>
                                            <span class="badge badge-available"
                                                >On time</span
                                            >
                                        </td>
                                        <td>
                                            <button
                                                class="btn btn-sm btn-outline-primary return-btn"
                                            >
                                                Return book
                                            </button>
                                        </td>
                                    </tr>
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
                                    <tr>
                                        <td>
                                            <strong>Atomic Habits</strong>
                                            <div class="muted-small">
                                                James Clear
                                            </div>
                                        </td>
                                        <td>Sep 05, 2026</td>
                                        <td>Sep 16, 2026</td>
                                        <td>
                                            <span class="badge badge-available"
                                                >Returned</span
                                            >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>The Alchemist</strong>
                                            <div class="muted-small">
                                                Paulo Coelho
                                            </div>
                                        </td>
                                        <td>Aug 12, 2026</td>
                                        <td>Aug 24, 2026</td>
                                        <td>
                                            <span class="badge badge-available"
                                                >Returned</span
                                            >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Deep Work</strong>
                                            <div class="muted-small">
                                                Cal Newport
                                            </div>
                                        </td>
                                        <td>Jul 03, 2026</td>
                                        <td>Jul 15, 2026</td>
                                        <td>
                                            <span class="badge badge-available"
                                                >Returned</span
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </main>
@endsection
