@extends('layouts.app')

@section('content')
<main class="page-view container-xl py-4 py-lg-5">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h1 class="h2 fw-bold mb-1">Library administration</h1>
            <p class="text-secondary mb-0">Manage books, loans, and member access.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <span class="badge badge-borrowed rounded-pill px-3 py-2">Admin preview</span>
            <a class="btn btn-outline-secondary btn-sm" href="{{ url('/') }}">↗ Public library</a>
        </div>
    </div>

    <!-- Stats -->
    <div class="row row-cols-2 row-cols-xl-4 g-3 mb-4">
        <div class="col">
            <div class="stat-card">
                <div class="stat-label">Total copies</div>
                <div id="adminTotalBooks" class="stat-number">248</div>
            </div>
        </div>
        <div class="col">
            <div class="stat-card">
                <div class="stat-label">Currently borrowed</div>
                <div class="stat-number">36</div>
            </div>
        </div>
        <div class="col">
            <div class="stat-card">
                <div class="stat-label">Registered users</div>
                <div class="stat-number">124</div>
            </div>
        </div>
        <div class="col">
            <div class="stat-card">
                <div class="stat-label">Overdue loans</div>
                <div class="stat-number text-danger">4</div>
            </div>
        </div>
    </div>

    <!-- Tab buttons -->
    <ul class="nav nav-tabs mb-4" id="adminTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="books-tab" data-bs-toggle="tab" data-bs-target="#adminBooks"
                    type="button" role="tab" aria-controls="adminBooks" aria-selected="true">
                ▤ Book inventory
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="loans-tab" data-bs-toggle="tab" data-bs-target="#adminLoans"
                    type="button" role="tab" aria-controls="adminLoans" aria-selected="false">
                ↔ Borrowed books
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="users-tab" data-bs-toggle="tab" data-bs-target="#adminUsers"
                    type="button" role="tab" aria-controls="adminUsers" aria-selected="false">
                ♙ Members &amp; roles
            </button>
        </li>
    </ul>

    <!-- Tab panels -->
    <div class="tab-content" id="adminTabsContent">

        <x-admin.book-inventory />

        <!-- ============ LOANS ============ -->
        <x-admin.borrowed-books />


        <!-- ============ USERS ============ -->
       
        <x-admin.user />
    </div>
</main>
<x-book-modal />
@endsection