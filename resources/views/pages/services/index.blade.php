@extends('layouts.adminlte4')
@section('title')
    <title>Services</title>
@endsection
@section('content')
    <div class="container">
        <h1>SERVICES TABLE</h1>
        <a href="/services/create" class="btn btn-primary">+ Add new service</a>
    </div>
    <div class="container">
        @if (@session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (@session('status'))
            <div class="alert alert-warning">
                {{ session('status') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Service Name</th>
                    <th>Description</th>
                    <th>Availability</th>
                    <th>Price</th>
                    <th>Category ID</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>
                            <a href="{{ route('services.show', $service->id) }}">
                                {{ $service->name }}
                            </a>
                        </td>
                        <td>{{ $service->description }}</td>
                        <td>{{ $service->availability }}</td>
                        <td>{{ $service->price }}</td>
                        <td>{{ $service->category_id }}</td>
                        <td>{{ $service->category->name }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('services.edit', $service->id) }}">Edit</a>
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit"
                                onclick="getEditForm({{ $service->id }})">Edit with Modal</a>
                            <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger"
                                    onclick="return confirm('Are you sure to delete {{ $service->id }} - {{ $service->name }}')">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('modals')
    <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
            <div class="modal-content">
                <div class="modal-body" id="modalContent">
                    {{-- Animasi loading bisa diletakkan di sini --}}
                </div>
            </div>
        </div>
    </div>
@endpush


@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        function getEditForm(id) {
            $('#modalContent').html('Memuat data...');

            $.ajax({
                type: 'POST',
                url: "{{ route('services.getEditForm') }}",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': id
                },
                success: function(data) {
                    $('#modalContent').html(data.msg);
                },
                error: function() {
                    $('#modalContent').html('Gagal memuat data.');
                }
            });
        }
    </script>
@endpush
