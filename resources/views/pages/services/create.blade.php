@extends('layouts.adminlte4')

@section('title')
<title>Add Service</title>
@endsection

@section('content')
<form method="POST" action="{{ route('services.store') }}" class="m-4">
    @csrf

    <div class="form-group mb-3">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" maxlength="128" required
            placeholder="Enter Service Name">
        <small id="nameHelp" class="form-text text-muted">Please write down the Service Name here.</small>
    </div>

    <div class="form-group mb-3">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required
            placeholder="Enter Service Description"></textarea>
    </div>

    <div class="form-group mb-3">
        <label for="category_id">Category</label>
        <select class="form-control" id="category_id" name="category_id" required>
            <option value="" disabled selected>-- Select a Category --</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="price">Price</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" required
            placeholder="Enter Price">
    </div>

    <div class="form-group mb-3">
        <label for="availability">Availability Date</label>
        <input type="date" class="form-control" id="availability" name="availability" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection