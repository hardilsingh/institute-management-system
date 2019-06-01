<?php

namespace App\Http\Controllers;

use App\Enrollment;
use App\Enquiry;
use App\Course;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Docs;

class DashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {

        $events = [];
        $data = Enquiry::all();
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->name . ' ' . $value->tel_no,
                    true,
                    new \DateTime($value->follow_up),
                    new \DateTime($value->follow_up . ' +1 day'),
                    null,
                    //Add color and link on event
                    [
                        'color' => '#f05050',
                        'url' => '/enquiry/' . $value->slug . '/edit',
                    ]
                );
            }
        }

        $calendar = Calendar::addEvents($events);
        $students = Enrollment::count();
        $enquiries = Enquiry::count();
        $courses = Course::count();
        $certificates = Docs::where('certificate', '1')->count();
        $students_comp = Enrollment::where('date_end', now()->toDateString())->orWhere('date_end_2', now()->toDateString())
            ->get();

        foreach ($students_comp as $student) {

            if ($student->date_end == now()->toDateString()) {
                $student->update([
                    'completed_1' => 1,
                ]);
            }

            if ($student->date_end_2 == now()->toDateString()) {
                $student->update([
                    'completed_2' => 1,
                ]);
            }
        }

        return view('admin.dashboard', compact(['students', 'enquiries', 'courses', 'calendar', 'certificates', 'students_comp']));
    }
}
