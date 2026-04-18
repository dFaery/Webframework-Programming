@extends('layouts.adminlte4')
@section('title')
<title>Categories</title>
@endsection
@section('content')
<h1>CATEGORIRES TABLE</h1>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Number of Services</th>
                <th>Services</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->services->count() }}</td>
                <td>
                    <ul>
                        @foreach ($category->services as $service)
                        <li>{{ $service->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection