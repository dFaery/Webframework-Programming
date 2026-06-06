<div class="modal-header">
    <h4 class="modal-title">Edit Article</h4>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<form method="POST" action="{{ route('articles.update', $article->id) }}">
    @csrf
    @method('PUT')

    <div class="modal-body">

        <div class="form-group mb-3">
            <label>Article ID</label>
            <input type="text" class="form-control" value="{{ $article->id }}" disabled>
        </div>

        <div class="form-group mb-3">
            <label for="doctor_id">Doctor</label>
            <select class="form-control" id="doctor_id" name="doctor_id" required>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $article->doctor_id == $doctor->id ? 'selected' : '' }}>
                        {{ $doctor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $article->title }}"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $article->content }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="draft" {{ $article->status == 'draft' ? 'selected' : '' }}>
                    Draft
                </option>
                <option value="published" {{ $article->status == 'published' ? 'selected' : '' }}>
                    Published
                </option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="views">Views</label>
            <input type="number" class="form-control" id="views" name="views_count" value="{{ $article->views_count }}"
                min="0">
        </div>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</form>
