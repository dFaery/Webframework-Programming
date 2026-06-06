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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                    <tr id="tr_{{ $doctor->id }}">
                        <td>{{ $doctor->id }}</td>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->status }}</td>
                        <td>Rp{{ $doctor->consultation_fee }}</td>
                        <td>
                            <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit" onclick="getEditForm({{ $doctor->id }})">Edit</a>
                            <a href="#" value="DeleteNoReload" class="btn btn-danger" onclick="if(confirm('Are you sure to delete {{ $doctor->id }} - {{ $doctor->name }} ?')) deleteDataRemove('{{ $doctor->id }}')">Delete</a>
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
                url: "{{ route('doctor.getEditForm') }}",
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
@push('script')
<script>
    function deleteDataRemove(id) {
        $.ajax({
            type: 'POST',
            url: '{{ route("doctor.deleteData") }}',
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'id': id
            },
            success: function(data) {
                if (data.status == "oke") {
                    $('#tr_' + id).remove();
                }
            }
        });
    }
</script>
@endpush