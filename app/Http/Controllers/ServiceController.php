<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();

        return view('pages.services.index', compact("services"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.services.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Service();
        $data->name = $request->post('name');
        $data->description = $request->post('description');
        $data->category_id = $request->category_id;
        $data->price = $request->price;
        $data->availability = $request->availability;
        $data->save();
        return redirect()->route('services.index')->with('success', 'Sucessfully created data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::find($id);
        // dd($service);
        return view('pages.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
