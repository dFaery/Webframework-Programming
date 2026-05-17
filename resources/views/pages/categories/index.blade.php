@extends('layouts.adminlte4')
@section('title')
<title>Categories</title>
@endsection
@section('content')
<!-- <div class="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>
</div> -->
<div class="container">
    <h1>CATEGORIRES TABLE</h1>
    <p>The <a href="#" onclick="showInfo()">.table</a> class adds basic styling (light padding and only horizontal dividers) to a table:</p>
    <div id="showInfo"></div>
    @if (@session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

</div>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Number of Services</th>
                <th>Show images</th>
                <th>Services</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#imageModal-{{ $category->id }}">
                        Show
                    </button>
                </td>
                <td>{{ $category->services->count() }}</td>
                <td>
                    <ul>
                        @foreach ($category->services as $service)
                        <li>{{ $service->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @push ('modal')
            <div class="modal fade" id="imageModal-{{ $category->id }}" tabindex="-1" aria-labelledby="imageModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="imageModalLabel">Gambar untuk Kategori {{$category->id}} </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex flex-column">
                                <span>{{ $category->id }} - {{ $category->name }}</span>
                                <img class="img-fluid mt-2" style="max-height:250px;" src="{{ asset('storage/' . $category->image) }}" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            @endpush
            @endforeach
        </tbody>
    </table>
</div>

@push("script")
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    function showInfo() {
        $.ajax({
            type: 'POST',
            url: '{{ route("category.showInfo") }}',
            data: '_token=<?php echo csrf_token(); ?>',
            success: function(data) {
                $('#showInfo').html(data.msg);
            }
        });
    }
</script>
@endpush
@endsection