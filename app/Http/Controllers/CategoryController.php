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
    public function edit(Category $category)
    {
        return view('pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Successfully updated data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Successfully deleted data');
        } catch (\PDOException $ex) {
            $msg = "Make sure there is no related data before deleting it.";
            return redirect()->route('categories.index')->with('status', $msg);
        }
    }

    public function showInfo()
    {
        $category = Category::with(['services'])
            ->withCount('services')
            ->orderBy('services_count', 'desc')
            ->first();

        return response()->json([
            'msg' => '<div class="alert alert-success"> Category dengan services terbanyak adalah ' . $category->name . ' </div>'
        ]);
    }

    public function getEditForm(Request $request)
    {
        $id = $request->id;
        $data = Category::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('pages.categories.getEditForm', compact('data'))->render()
        ), 200);
    }

    public function getEditFormB(Request $request)
    {
        $id = $request->id;
        $data = Category::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('pages.categories.getEditFormB', compact('data'))->render()
        ), 200);
    }

    public function saveDataUpdate(Request $request)
    {
        $id = $request->id;
        $data = Category::find($id);
        $data->name = $request->name;
        $data->save();
        return response()->json(array('status' => 'oke', 'msg' => 'category data is up-to-date !'), 200);
    }

    public function deleteData(Request $request)
    {
        $id = $request->id;
        $data = Category::find($id);
        $data->delete();
        return response()->json(array(
            'status' => 'oke',
            'msg' => 'category data is removed !'
        ), 200);
    }
}
