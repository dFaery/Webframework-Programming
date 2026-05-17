@extends('layouts.adminlte4')
@section('title')
<title>Home</title>
@endsection
@section('content')
<div class="container">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>
</div>
@foreach($dataTables as $tableName => $rows)
<div class="row">
    <div class="col-12 mb-4">
        <h5>TABLE {{ $loop->iteration }}. {{ $tableName }}</h5>
        <div class="table-responsive" style="max-height: 500px;">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        @if(count($rows) > 0)
                        @foreach(array_keys($rows[0]->toArray()) as $column)
                        <th>{{ $column }}</th>
                        @endforeach
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rows as $row)
                    <tr>
                        @foreach ($row->toArray() as $value)
                        <td>{{ $value }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endforeach

@push('modals')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endpush
@endsection