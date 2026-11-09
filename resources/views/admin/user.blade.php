@extends('layouts.admin')

@section('panel')
   <div class="surface p-3 p-lg-4">
                <div class="mb-3">
                    <h2 class="h5 fw-bold mb-1">Members &amp; roles</h2>
                    <p class="text-secondary small mb-0">Review users and manage their access level.</p>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-md">
                        <input class="form-control admin-search" placeholder="Search username...">
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <select class="form-select">
                            <option>All roles</option>
                            <option>User</option>
                            <option>Admin</option>
                        </select>
                    </div>
                </div>

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
                            <tr>
                                <td><strong>Yeasin Arafat</strong><div class="muted-small">@@yeasin</div></td>
                                <td>Oct 10, 2026</td>
                                <td>2</td>
                                <td>
                                    <select class="form-select form-select-sm role-select">
                                        <option>User</option>
                                        <option>Admin</option>
                                    </select>
                                </td>
                                <td><span class="badge badge-available">Active</span></td>
                                <td><button class="btn btn-sm btn-outline-danger user-toggle">Suspend</button></td>
                            </tr>
                            <tr>
                                <td><strong>Nadia Rahman</strong><div class="muted-small">@@nadia</div></td>
                                <td>Sep 22, 2026</td>
                                <td>1</td>
                                <td>
                                    <select class="form-select form-select-sm role-select">
                                        <option>User</option>
                                        <option>Admin</option>
                                    </select>
                                </td>
                                <td><span class="badge badge-available">Active</span></td>
                                <td><button class="btn btn-sm btn-outline-danger user-toggle">Suspend</button></td>
                            </tr>
                            <tr>
                                <td><strong>Arif Hasan</strong><div class="muted-small">@@arif</div></td>
                                <td>Aug 04, 2026</td>
                                <td>0</td>
                                <td>
                                    <select class="form-select form-select-sm role-select">
                                        <option>User</option>
                                        <option>Admin</option>
                                    </select>
                                </td>
                                <td><span class="badge badge-overdue">Suspended</span></td>
                                <td><button class="btn btn-sm btn-outline-success user-toggle">Activate</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="alert alert-info small mt-3 mb-0">
                    Role changes and suspensions are visual demos only. Protect these actions with
                    server-side authorization in the real application.
                </div>
            </div>
@endsection