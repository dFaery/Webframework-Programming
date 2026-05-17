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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection