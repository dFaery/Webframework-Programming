<div class="modal-header">
    <h4 class="modal-title">Edit Doctor</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<form method="POST" action="{{ route('doctors.update', $doctor->id) }}">
    @csrf
    @method('PUT')

    <div class="modal-body">
        <div class="form-group">
            <label for="edit_name">Name</label>
            <input type="text" class="form-control" id="edit_name" name="name"
                value="{{ $doctor->name }}" placeholder="Enter Doctor Name" required>
            <small class="form-text text-muted">Ubah nama dokter sesuai kebutuhan.</small>
        </div>
        <div class="form-group">
            <label for="edit_email">Email</label>
            <input type="email" class="form-control" id="edit_email" name="email"
                value="{{ $doctor->email }}" placeholder="Enter Doctor Email" required>
            <small class="form-text text-muted">Ubah email dokter sesuai kebutuhan.</small>
        </div>
        <div class="form-group">
            <label for="edit_status">Status</label>
            <input type="text" class="form-control" id="edit_status" name="status"
                value="{{ $doctor->status }}" placeholder="Enter Doctor Status" required>
            <small class="form-text text-muted">Ubah status dokter sesuai kebutuhan.</small>
        </div>
        <div class="form-group">
            <label for="edit_consultation_fee">Consultation Fee</label>
            <input type="number" class="form-control" id="edit_consultation_fee" name="consultation_fee"
                value="{{ $doctor->consultation_fee }}" placeholder="Enter Consultation Fee" required>
            <small class="form-text text-muted">Ubah tarif konsultasi dokter sesuai kebutuhan.</small>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</form>