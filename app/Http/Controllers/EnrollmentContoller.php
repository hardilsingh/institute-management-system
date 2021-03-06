<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Batch;
use App\Course;
use App\Enrollment;
use App\Http\Requests\enrollRequest;
use App\FeeManager;
use App\Enquiry;
use App\Mail\StudentEnrolled;
use App\Docs;
use Notification;
use Illuminate\Support\Facades\Auth;

class EnrollmentContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(enrollRequest $request)
    {
        //enroll student
        $input = $request->all();
        $input['reg_no'] = 'CBA/' . time();
        $enroll = Enrollment::create($input); 
        $enroll->save([
            $enroll->date_end = Enrollment::endgame($enroll->date_join, $enroll->course->duration ),
            $enroll->date_end_2 = $enroll->course_id_2 ? Enrollment::endgame($enroll->date_join_2, $enroll->course2->duration) : null ,

        ]);


        $enroll->sms($enroll->tel_no, $enroll->reg_no);

        //create fee manager account automatically
        $fee_id = Enrollment::createFeeManager($enroll->id, $enroll->course_id, $enroll->slug, $enroll->course_id_2);

        //create docs entry automatically
        Enrollment::createDocs($enroll->id, $enroll->course_id, $enroll->course_id_2);

        if ($input['id']) {
            $enrolled = Enquiry::findOrFail($input['id']);
            $enrolled->enrolled = 1;
            $enrolled->save();
        }


        $request->session()->flash('student_enrolled', 'Student enrollment complete.');
        return redirect('feemanager/' . $fee_id->slug . '/edit');
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
    }


    // public function sendNotifications() {

    //     $user = Auth::user();

    // }
}
