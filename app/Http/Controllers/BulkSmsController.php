<?php

namespace App\Http\Controllers;


use App\BulkSms;
use App\Enrollment;
use App\Http\Requests\BulkSmsRequest;

class BulkSmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $messages = BulkSms::all();
        return view('admin.bulk_sms.index', compact('messages'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BulkSmsRequest $request)
    {
        //
        $students = Enrollment::all();
        foreach ($students as $student) {
            BulkSms::sms($student->tel_no, $request->msg);
        }
        BulkSms::create($request->all());
        $request->session()->flash('message_sent', 'Messages sent successfully');

        return redirect()->back();
    }
}
