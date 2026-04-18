@extends('layouts.adminlte4')

@section('title')
<title>Doctors</title>
@endsection

@section('content')
<h1>DOCTORS TABLE</h1>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Consultation Fee</th>                
            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
            <tr>
                <td>{{ $doctor->id }}</td>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->status }}</td>
                <td>Rp{{ $doctor->consultation_fee }}</td>                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection