  <div class="tab-pane fade" id="adminLoans" role="tabpanel" aria-labelledby="loans-tab" tabindex="0">
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
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>The Psychology of Money</strong></td>
                                <td><strong>Yeasin Arafat</strong><div class="muted-small">@@yeasin</div></td>
                                <td>Oct 20, 2026</td>
                                <td>Nov 03, 2026</td>
                                <td><span class="badge badge-available">On time</span></td>
                                <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                            </tr>
                            <tr>
                                <td><strong>Atomic Habits</strong></td>
                                <td><strong>Nadia Rahman</strong><div class="muted-small">@@nadia</div></td>
                                <td>Oct 02, 2026</td>
                                <td>Oct 16, 2026</td>
                                <td><span class="badge badge-overdue">Overdue</span></td>
                                <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                            </tr>
                            <tr>
                                <td><strong>Clean Code</strong></td>
                                <td><strong>Arif Hasan</strong><div class="muted-small">@@arif</div></td>
                                <td>Oct 24, 2026</td>
                                <td>Nov 07, 2026</td>
                                <td><span class="badge badge-available">On time</span></td>
                                <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
