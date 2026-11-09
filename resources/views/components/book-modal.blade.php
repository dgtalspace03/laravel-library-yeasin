
<div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" method="POST" action="{{ route('addBook') }}">
            @csrf
            <div class="modal-header">
                <h2 class="modal-title fs-5 fw-bold" id="modalTitle">
                    Add a new book
                </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="newTitle" class="form-label fw-semibold">Book title</label>
                    <input id="newTitle" class="form-control" name="title" required placeholder="e.g. The Pragmatic Programmer" />
                     @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="newAuthor" class="form-label fw-semibold">Author</label>
                    <input id="newAuthor" class="form-control" name="author" required placeholder="Author name" />
                 @error('author')
                        <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="row g-3">
                    <div class="col-7">
                        <label for="newCategory" class="form-label fw-semibold">Category</label>
                        <select id="newCategory" class="form-select" name="category">
                            <option>Fiction</option>
                            <option>Personal Growth</option>
                            <option>Technology</option>
                            <option>History</option>
                            <option>Science</option>
                        </select>
                     @error('category')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="col-5">
                        <label for="newQuantity" class="form-label fw-semibold">Total copies</label>
                        <input id="newQuantity" class="form-control" name="quantity" type="number" min="1" value="1" required />
                    </div>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Thumbnail</label>
                    <input class="form-control" type="file" id="formFile" name="thumblain">
                    @error('thumblain')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    Add book
                </button>
            </div>
        </form>
    </div>
</div>
