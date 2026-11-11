@extends('layouts.admin')

@section('panel')
    <div class="surface p-3 p-lg-4">
        <div class="mb-3">
            <h2 class="h5 fw-bold mb-1">Members &amp; roles</h2>
            <p class="text-secondary small mb-0">Review users and manage their access level.</p>
        </div>


        <form action="" class="row g-2 mb-3">
            @php
                $roleObj = [
                    'all' => 'All role',
                    'user' => 'User',
                    'admin' => 'Admin',
                ];
                $statusObj = [
                    'all' => 'All status',
                    'active' => 'Active',
                    'suspended' => 'Suspended'
                ];
            @endphp
            <div class="col-md">
                <input value="{{ $search }}" class="form-control admin-search" name="search"
                    placeholder="Search username...">
            </div>
            <div class="col-sm-6 col-md-3">
                <select class="form-select" name="role">
                   @foreach ($roleObj as $key => $label )
                    <option @selected($role==$key) value="{{ $key }}">{{ $label }}</option>
                   @endforeach
                </select>
            </div>
            <div class="col-sm-6 col-md-3">
                <select class="form-select" name="status">
                    @foreach ($statusObj as $key => $label )
                        <option @selected($status==$key) value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary col-sm-3 col-md-2">Filter</button>
        </form>


        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Member</th>
                        <th>Joined</th>
                        <th>Books borrowed</th>
                        <th>Role</th>
                        <th>Account</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><strong>{{ $user->name }}</strong>
                                <div class="muted-small">{{ $user->email }}</div>
                            </td>
                            <td>{{ $user->created_at->format('d / m / y') }}</td>
                            <td>2</td>
                            <form action="{{ route('admin.edit-role', $user->id) }}" method="POST">
                                @csrf
                                <td>
                                    <select class="form-select" name='role'>

                                        @foreach (['user', 'admin'] as $role)
                                            <option @selected($user->role === $role) value="{{ $role }}">
                                                {{ $role }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select" name="status" id="">
                                        @foreach (['active', 'suspended'] as $status)
                                            <option @selected($user->status == $status) value="{{ $status }}">
                                                {{ $status }}

                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <button
                                        class="btn btn-sm  {{ auth()->id() == $user->id ? 'disabled btn-secondary' : 'btn-outline-danger' }}">
                                        {{ auth()->id() == $user->id ? 'You' : 'Edit Role' }}
                                    </button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
@endsection
