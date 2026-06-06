@extends('layouts.adminlte4')

@section('title')
<title>Transactions</title>
@endsection
@section('content')
<div class="container-fluid">
    <h1>TRANSACTIONS TABLE</h1>
    <a href="/transactions/create" class="btn btn-primary">+ Add new transactions</a>
</div>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>user_id</th>
                <th>doctor_id</th>
                <th>transaction_code</th>
                <th>schedule_time</th>
                <th>consultation_fee</th>
                <th>admin_fee</th>
                <th>total_price</th>
                <th>payment_method</th>
                <th>payment_status</th>
                <th>transaction_status</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->user_id }}</td>
                <td>{{ $transaction->doctor_id }}</td>
                <td>{{ $transaction->transaction_code }}</td>
                <td>{{ $transaction->schedule_time }}</td>
                <td>{{ $transaction->consultation_fee }}</td>
                <td>{{ $transaction->admin_fee }}</td>
                <td>{{ $transaction->total_price }}</td>
                <td>{{ $transaction->payment_method }}</td>
                <td>{{ $transaction->payment_status }}</td>
                <td>{{ $transaction->transaction_status }}</td>
                <td>
                    <a class="btn btn-warning" href="{{ route('transactions.edit', $transaction->id) }}">Edit</a>
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit" onclick="getEditForm({{ $transaction->id }})">Edit with modal</a>
                    <form action="{{ route('transactions.destroy', $transaction->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure to delete {{ $transaction->id }} - {{ $transaction->transaction_code}}')">
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
                url: "{{ route('transaction.getEditForm') }}",
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
