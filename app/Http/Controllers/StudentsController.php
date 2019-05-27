<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrollment;
use App\Http\Requests\enrollRequest;
use App\Batch;
use App\Course;
use Excel;
use App\Exports\StudentsViewExport;
use Facades\jpmurray\LaravelCountdown\Countdown;
use Illuminate\Support\Carbon;
use App\FeeManager;

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
        $students = Enrollment::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.students.index', compact('students'));
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
    public function edit($slug)
    {
        //
        $courses = Course::all();
        $batches = Batch::all();
        $student = Enrollment::where('slug', $slug)->first();
        return view('admin.students.edit', compact(['student', 'courses', 'batches', 'countdown']));
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
        $student = Enrollment::findOrFail($id);
        $student->update($request->all());
        $student->save([
            $student->date_end_2 = Enrollment::endgame($student->date_join_2, $student->course2->duration),
        ]);
        if ($request->course_id_2) {
            $fee_manager = FeeManager::where('enrollment_id', $id)->first();
            $newBalance = $student->course2->fee + ($fee_manager->course_id_2 ? $fee_manager->balance - $fee_manager->course2->fee : $fee_manager->balance );
            $total_fee = $student->course2->fee + ($fee_manager->course_id_2 ? $fee_manager->discounted_fee - $fee_manager->course2->fee : $fee_manager->discounted_fee );

            $fee_manager->update([
                'course_id_2' => $request->course_id_2,
                'balance' => $newBalance,
                'discounted_fee'=>$total_fee,
            ]);
        }

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

    public function export()
    {
        $type = 'xls';
        return Excel::download(new StudentsViewExport, 'Students.' . $type);
    }
}
