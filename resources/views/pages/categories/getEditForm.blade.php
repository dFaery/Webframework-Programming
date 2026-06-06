<div class="modal-header">
    <h4 class="modal-title">Edit Category (Type A)</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<form method="POST" action="{{ route('categories.update', $data->id) }}">
    @csrf
    @method('PUT')

    <div class="modal-body">
        <div class="form-group">
            <label for="edit_name">Category Name</label>
            <input type="text" class="form-control" id="edit_name" name="name"
                value="{{ $data->name }}" placeholder="Enter Category Name" required>
            <small class="form-text text-muted">Ubah nama kategori sesuai kebutuhan.</small>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</form>