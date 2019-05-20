<?php

namespace App\Exports;
 
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Enquiry;

class EnquiriesViewExport implements FromView
{
    public function view() : View
    {
        return view('admin.export_tables.enquiry', [
            'enquiries' => Enquiry::all()
        ]);
    }
}
