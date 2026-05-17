@extends('layouts.adminlte4')

@section('title')
<title>Add Transaction</title>
@endsection

@section('content')
<form method="POST" action="{{ route('transactions.store') }}" class="m-4">
    @csrf

    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="user_id">Patient (User)</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    <option value="" disabled selected>-- Select Patient --</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="doctor_id">Doctor</label>
                <select class="form-control" id="doctor_id" name="doctor_id" required>
                    <option value="" disabled selected>-- Select Doctor --</option>
                    @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="schedule_time">Schedule Time</label>
                <input type="datetime-local" class="form-control" id="schedule_time" name="schedule_time">
            </div>

            <div class="form-group mb-3">
                <label for="payment_method">Payment Method</label>
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="transfer">Transfer</option>
                    <option value="ewallet">E-Wallet</option>
                    <option value="cash">Cash</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="payment_status">Payment Status</label>
                <select class="form-control" id="payment_status" name="payment_status" required>
                    <option value="pending">Pending</option>
                    <option value="paid">Paid</option>
                    <option value="failed">Failed</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="transaction_status">Transaction Status</label>
                <select class="form-control" id="transaction_status" name="transaction_status" required>
                    <option value="waiting">Waiting</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
        </div>

        <div class="col-md-6">            
            <div class="form-group mb-3 mt-4 p-3 border rounded bg-light">
                <label>Select Included Services</label>
                <div class="mt-2">
                    @foreach($services as $service)
                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input"
                            id="service_{{ $service->id }}"
                            name="service_ids[]"
                            value="{{ $service->id }}">
                        <label class="custom-control-label" for="service_{{ $service->id }}">
                            {{ $service->name }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Submit Transaction</button>
</form>
@endsection