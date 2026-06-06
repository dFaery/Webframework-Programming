<form method="POST" action="{{ route('transactions.update', $transaction->id) }}" class="m-4">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="user_id">Patient (User)</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $transaction->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="doctor_id">Doctor</label>
                <select class="form-control" id="doctor_id" name="doctor_id" required>
                    @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}" {{ $transaction->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="schedule_time">Schedule Time</label>
                <input type="datetime-local" class="form-control" id="schedule_time" name="schedule_time" value="{{ $transaction->schedule_time }}">
            </div>

            <div class="form-group mb-3">
                <label for="payment_method">Payment Method</label>
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="transfer" @selected($transaction->payment_method == 'transfer')>Transfer</option>
                    <option value="ewallet" @selected($transaction->payment_method == 'ewallet')>E-Wallet</option>
                    <option value="cash" @selected($transaction->payment_method == 'cash')>Cash</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="payment_status">Payment Status</label>
                <select class="form-control" id="payment_status" name="payment_status" required>
                    <option value="pending" @selected($transaction->payment_status == 'unpaid')>Pending</option>
                    <option value="paid" @selected($transaction->payment_status == 'paid')>Paid</option>
                    <option value="failed" @selected($transaction->payment_status == 'failed')>Failed</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="transaction_status">Transaction Status</label>
                <select class="form-control" id="transaction_status" name="transaction_status" required>
                    <option value="waiting" @selected($transaction->transaction_status == 'waiting')>Waiting</option>
                    <option value="ongoing" @selected($transaction->transaction_status == 'ongoing')>Ongoing</option>
                    <option value="completed" @selected($transaction->transaction_status == 'completed')>Completed</option>
                    <option value="cancelled" @selected($transaction->transaction_status == 'cancelled')>Cancelled</option>
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
                            value="{{ $service->id }}"
                            @checked(in_array($service->id, $transaction->services->pluck('id')->toArray()))>
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