<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrollment;
use App\Http\Requests\enrollRequest;
use App\Batch;
use App\Course;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Enrollment::all()->sortByDesc('created_at');
        return view('admin.students.index' , compact('students') );
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $student = Enrollment::findOrFail($id)->first();
        return view('admin.students.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $courses = Course::all();
        $batches = Batch::all();
        $student = Enrollment::findOrFail($id)->first();
        return view('admin.students.edit' , compact(['student' ,'courses' , 'batches']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(enrollRequest $request, $id)
    {
        //
        Enrollment::findOrFail($id)->update($request->all());
        $request->session()->flash('std_updated', 'Student profile updated successfully');
        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Enrollment::findOrFail($id)->delete();
        session()->flash('student_del', 'Student profile deleted successfully.');
        return redirect()->back();
    }
}
