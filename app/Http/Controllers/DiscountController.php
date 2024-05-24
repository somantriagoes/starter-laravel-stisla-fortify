<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['search'] = '';
        return view('discount.index')->with(['search'=>'']);
    }

    public function read(Request $request)
    {
        /**
         * Modify paginate() param from jquery request :
         * 1) "$page" is taken from the window.location.search in js function
         * 2) will change to discount-read if not using setPath(route('discount.index'))
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

        $discounts = Discount::orderBy('id', 'ASC')
        ->when($request->input('search'), function($query, $search){
            $query->where('name', 'LIKE', '%'.$search.'%');
        })->paginate($perPage, ['*'], 'page', $page)->setPath(route('discount.index'));

        return view('discount.dataTable')->with(
            [
                'discounts' => $discounts,
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
        return view('discount.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $discount = new Discount();
        $discount->name = $request->name;
        $discount->type = $request->type;
        $discount->discount = $request->discount;
        $discount->created_by = auth()->user()->id;
        $discount->save();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $discount = Discount::findOrFail($id);
        return view('discount.edit')->with(
            [
                'discount' => $discount,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $discount = Discount::findOrFail($id);
        $discount->name = $request->name;
        $discount->type = $request->type;
        $discount->discount = $request->discount;
        $discount->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Discount::findOrFail($id);
        $category->delete();
    }
}
