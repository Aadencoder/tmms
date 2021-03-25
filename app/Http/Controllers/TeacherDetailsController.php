<?php

namespace App\Http\Controllers;

use App\TeacherDetails;
use Illuminate\Http\Request;

class TeacherDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeacherDetails  $teacherDetails
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherDetails $teacherDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeacherDetails  $teacherDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherDetails $teacherDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeacherDetails  $teacherDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherDetails $teacherDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeacherDetails  $teacherDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherDetails $teacherDetails)
    {
        //
    }
}
