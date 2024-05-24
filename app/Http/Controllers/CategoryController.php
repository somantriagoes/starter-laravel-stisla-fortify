<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index() {
        $data['search'] = '';
        return view('category.index')->with(['search'=>'']);
    }

    public function read(Request $request)
    {
        /**
         * Modify paginate() param from jquery request :
         * 1) "$page" is taken from the window.location.search in js function
         * 2) will change to category-read if not using setPath(route('category.index'))
         */

        $perPage = 5;
        $page = 1;
        if($request->page) {
            $page = $request->page;
        }

        $search = '';
        if($request->input('search')) {
            $search = $request->input('search');
        }

        $categories = Category::orderBy('id', 'ASC')
        ->when($request->input('search'), function($query, $search){
            $query->where('name', 'LIKE', '%'.$search.'%');
        })->paginate($perPage, ['*'], 'page', $page)->setPath(route('category.index'));

        return view('category.dataTable')->with(
            [
                'categories' => $categories,
                'search' => $search,
                'page' => $page
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'name'     => 'required|unique:categories|min:5',
        // ]);

        // Category::create([
        //     'name'    => $request->name,
        //     'created_by' => auth()->user()->id
        // ]);

        // if created_by removed at fillable model, use it
        $category = new Category();
        $category->name = $request->name;
        $category->created_by = auth()->user()->id;
        $category->save();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit')->with(
            [
                'category' => $category,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('user.index')->with(['success' => 'Category data change successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }
}
