<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('pages.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->status = $request->status;
        $doctor->consultation_fee = $request->consultation_fee;
        $doctor->save();

        return redirect()
            ->route('doctors.index')
            ->with('success', 'Successfully updated data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        try{
            $doctor->delete();
            return redirect()->route('doctors.index')->with('success', 'Success Delete Data.');
        }
        catch(\PDOException $ex){
            $msg = "Make sure there is no related data before deleting it.";
            return redirect()->route('doctors.index')->with('Error', $msg);
        }
    }

    public function getEditForm(Request $request){
        $id = $request->id;
        $doctor = Doctor::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('pages.doctors.getEditForm', compact('doctor'))->render()
        ));
    }

    public function deleteData(Request $request) {
        $id = $request->id;
        $doctor = Doctor::find($id);
        $doctor->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'Doctor data is removed!'
        ), 200);
    }
}
