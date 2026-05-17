<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('pages.categories.index', compact('categories'));

        // $allCategories = DB::table('categories')->get();

        // return view('services.index', ['categories' => $allCategories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        return view('pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Category();
        $data->name = $request->get('name');
        $data->save();
        return redirect()->route('categories.index')->with('success', 'Sucessfully created data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

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

    public function showInfo()
    {
        $category = Category::with(['services'])
            ->withCount('services')
            ->orderBy('services_count', 'desc')
            ->first();

        return response()->json([
            'msg' => '<div class="alert alert-success"> Category dengan services terbanyak adalah '.$category->name.' </div>'
        ]);
    }
}