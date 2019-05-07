<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Http\Requests\createCourseRequest;
use App\Centre;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::all()->sortByDesc('created_at');
        return view('admin.course.index' , compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $centres = Centre::pluck('name' , 'id');
        return view('admin.course.create' , compact('centres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createCourseRequest $request)
    {
        //
        Course::create($request->all());
        session()->flash('course_created' , 'Course added successfully');
        return redirect('/course');
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
        $centres = Centre::pluck('name' , 'id');
        $course = Course::findOrFail($id);
        return view('admin.course.edit' , compact('course') , compact('centres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(createCourseRequest $request, $id)
    {
        //
        Course::findOrFail($id)->update($request->all());
        $request->session()->flash('course_updated', 'Course updated successfully');
        return redirect('/course');
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
        Course::findOrFail($id)->delete();
        session()->flash('course_deleted','Course deleted successfully');
        return redirect()->back();

    }
}
