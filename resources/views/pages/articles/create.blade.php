@extends('layouts.adminlte4')
@section('title')
    <title>Articles</title>
@endsection
@section('content')
    <form method="POST" action="{{ route('articles.store') }}">
        @csrf        
        <div class="modal-body">            
            <div class="form-group mb-3">
                <label for="doctor_id">Doctor</label>
                <select class="form-control" id="doctor_id" name="doctor_id" required>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->id }}">
                            {{ $doctor->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group mb-3">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="draft">
                        Draft
                    </option>
                    <option value="published">
                        Published
                    </option>
                </select>
            </div>            
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
@endsection
