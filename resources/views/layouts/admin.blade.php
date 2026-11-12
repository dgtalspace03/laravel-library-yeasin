@extends('layouts.app')

@section('content')
<div class="page-view container-xl py-4 py-lg-5">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h1 class="h2 fw-bold mb-1">Library administration</h1>
            <p class="text-secondary mb-0">Manage books, loans, and member access.</p>
        </div>
        <div class="d-flex align-items-center gap-2">
            
            <a class="btn btn-outline-secondary btn-sm" href="{{ url('/') }}">↗ Public library</a>
        </div>
    </div>


    <div class="row row-cols-2 row-cols-xl-4 g-3 mb-4">
        <div class="col"><div class="stat-card"><div class="stat-label">Total copies</div><div class="stat-number">{{ $total_copies }}</div></div></div>
        <div class="col"><div class="stat-card"><div class="stat-label">Currently borrowed</div><div class="stat-number">{{ $currently_borrowed}}</div></div></div>
        <div class="col"><div class="stat-card"><div class="stat-label">Total Borrowed</div><div class="stat-number text-danger">{{$total_borrowed}}</div></div></div>
        <div class="col"><div class="stat-card"><div class="stat-label">Registered users</div><div class="stat-number">{{$total_user}}</div></div></div>
    </div>

    <ul class="nav nav-tabs mb-4" id="catalog">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.books*') ? 'active' : '' }}"
               href="{{ route('admin.books') }}">▤ Book inventory</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.borrows*') ? 'active' : '' }}"
               href="{{ route('admin.borrows') }}">↔ Borrowed books</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}"
               href="{{ route('admin.users') }}">♙ Members &amp; roles</a>
        </li>
    </ul>

    @yield('panel')
</div>
@endsection