@extends('layouts.adminlte4')
@section('content')
<form method="POST" action="{{ route('categories.update', $category->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{ $category->name }}">
        <small id="name" class="form-text text-muted">Please write down Category Name here.</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection