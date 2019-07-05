<?php

 
namespace App\Exports;
 
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Enrollment;

class StudentsViewExport implements FromView
{
    public function view() : View
    {
        return view('admin.export_tables.student_table', [
            'students' => Enrollment::all()
        ]);
    }
}