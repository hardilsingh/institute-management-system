<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enquiry;
use App\Course;
use App\Http\Requests\CreateEnquiry;
use App\Batch;
use App\Exports\EnquiriesViewExport;
use Excel;

class EnquiriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $courses = Course::all();
        $enquiries = Enquiry::orderBy('created_at' , 'DESC')->paginate(20);
        return view('admin.enquiries.index' , compact(['enquiries' , 'courses']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $batches = Batch::all();
        $courses = Course::all();
        return view('admin.enquiries.create' , compact(['courses' , 'batches']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEnquiry $request)
    {
        //
        Enquiry::create($request->all());
        $request->session()->flash('enquiry_created', 'Enquiry created successfully');
        return redirect('/enquiry');
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
    public function edit($slug)
    {
        //
        $enquiry = Enquiry::where('slug' , $slug)->first();
        $batches = Batch::all();
        $courses = Course::all();
        return view('admin.enquiries.edit' , compact(['enquiry' , 'batches' , 'courses']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Enquiry::findOrFail($id)->update($request->all());
        $request->session()->flash('enq_updated', 'Enquiry updated successfully. Next Follow up date is '. $request->follow_up);
        return redirect()->back();
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
        Enquiry::findOrFail($id)->delete();
        session()->flash('enquiry_deleted', 'Enquiry Deleted successfully.');
        return redirect()->back();
    }

    public function export()
    {
        $type = 'xls';
        return Excel::download(new EnquiriesViewExport, 'enquiries.'.$type);
    }
}
