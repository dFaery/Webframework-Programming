<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Service;
use App\Models\User;
use App\Models\Doctor;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();

        return view('pages.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        $users = User::all();
        $doctors = Doctor::all();
        return view('pages.transactions.create', compact('services', 'users', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $doctor = Doctor::findOrFail($request->doctor_id);
        $consultation_fee = $doctor->consultation_fee;

        //dummy
        $admin_fee = 5000;

        $total_services_price = Service::whereIn('id', $request->service_ids)->sum('price');
        $total_price = $consultation_fee + $admin_fee + $total_services_price;

        $transaction = new Transaction();
        $transaction->user_id = $request->user_id;
        $transaction->doctor_id = $request->doctor_id;
        $transaction->transaction_code = 'TRX-' . strtoupper(uniqid());
        $transaction->schedule_time = $request->schedule_time;
        $transaction->consultation_fee = $consultation_fee;
        $transaction->admin_fee = $admin_fee;
        $transaction->total_price = $total_price;
        $transaction->payment_method = $request->payment_method;
        $transaction->payment_status = $request->payment_status;
        $transaction->transaction_status = $request->transaction_status;

        $transaction->save();

        $transaction->services()->attach($request->service_ids);

        return redirect()->route('transactions.index')->with('success', 'Transaction successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $services = Service::all();
        $users = User::all();
        $doctors = Doctor::all();
        return view('pages.transactions.edit', compact('services', 'users', 'doctors', 'transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $transaction->user_id = $request->user_id;
        $transaction->doctor_id = $request->doctor_id;
        $transaction->schedule_time = $request->schedule_time;
        $transaction->payment_method = $request->payment_method;
        $transaction->payment_status = $request->payment_status;
        $transaction->transaction_status = $request->transaction_status;
        $transaction->services()->attach($request->service_ids);
        $transaction->save();

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Successfully updated data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        try {
            $transaction->delete();
            return redirect()->route('transactions.index')->with('success', 'Successfully deleted data');
        } catch (\PDOException $ex) {
            $msg = "Make sure there is no related data before deleting it.";
            return redirect()->route('transactions.index')->with('status', $msg);
        }
    }

    public function getEditForm(Request $request)
    {
        $id = $request->id;
        $transaction = Transaction::find($id);
        $services = Service::all();
        $users = User::all();
        $doctors = Doctor::all();

        return response()->json([
            'status' => 'oke',
            'msg' => view('pages.transactions.getEditForm', compact('transaction', 'services', 'users', 'doctors'))->render()
        ], 200);
    }
}
