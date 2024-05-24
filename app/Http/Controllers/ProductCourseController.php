<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Lecturer;
use App\Models\Discount;
use App\Models\ProductCourse;
use Illuminate\Http\Request;

class ProductCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_courses = ProductCourse::with(['categories', 'lecturers', 'discounts'])->paginate(10);
        return view('product_courses.index', compact('product_courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'ASC')->get();
        $lecturers = Lecturer::with('User')->get()->sortBy('User.name'); // sort by Asc
        $discounts = Discount::orderBy('id', 'ASC')->get();

        return view('product_courses.create')->with([
            'categories' => $categories,
            'lecturers' => $lecturers,
            'discounts' => $discounts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:product_courses|max:255',
            'category' => 'required',
            'language' => 'required',
            'description' => 'required',
            'lecturer' => 'required',
            'price' => 'required|numeric',
            'sales_price' => 'required|numeric',
            'image_ads' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'series' => 'required',
            'duration' => 'required|numeric'
        ]);

        $imageName = time().'.'.$request->image_ads->extension();
        $request->image_ads->move(public_path('product_courses'), $imageName);

        $product_course = new ProductCourse;
        $product_course->name = $request->name;
        $product_course->category_id = $request->category;
        $product_course->language = $request->language;
        $product_course->course_level = $request->course_level;
        $product_course->description = $request->description;
        $product_course->lecturer_id = $request->lecturer;
        $product_course->discount_id = $request->discount;
        $product_course->price = $request->price;
        $product_course->series = $request->series;
        $product_course->image_ads = 'product_courses/'.$imageName;
        $product_course->duration = $request->duration;
        $product_course->save();

        // return redirect()->route('product-courses.index')->with('success', 'Product Course created successfully.');
        return redirect()->route('product-courses.upload', $product_course)->with('success', 'Product Course created successfully.'); // $product_course = id

    }

    public function upload($id) {
        $product_courses = ProductCourse::with(['categories', 'lecturers', 'discounts'])
        ->where('id', $id)->first();
        return view('product_courses.upload', compact('product_courses'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCourse $productCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCourse $productCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCourse $productCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCourse $productCourse)
    {
        //
    }
}
