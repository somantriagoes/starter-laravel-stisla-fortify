<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $lecturers = DB::table('users')
            ->leftJoin('lecturers', 'lecturers.user_id', '=', 'users.id')
            ->whereIn('role', ['lecturer'])
        ->when($request->input('search'), function($query, $search){
            $query->whereIn('role', ['lecturer'])
                ->whereAny(['email', 'name'], 'LIKE', '%'.$search.'%');
        })->orderBy('users.id', 'ASC')->paginate(10);
        return view('lecturer.index', compact('lecturers'));
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
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $lecturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer)
    {
        //
    }
}
