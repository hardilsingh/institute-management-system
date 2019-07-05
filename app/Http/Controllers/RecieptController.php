<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reciept;
use App\Enrollment;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RecieptViewExport;

class RecieptController extends Controller
{
    //


    public function index() {
        $reciepts = Reciept::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.invoice.index' , compact('reciepts'));
    }

    public function show($id) {
        $reciept = Reciept::findOrFail($id);
        $student = Enrollment::findOrFail($reciept->enrollment_id);
        return view('admin.invoice.reciept' , compact(['reciept' , 'student']));
    }

public function update(Request $request , $id) {
        Reciept::findOrFail($id)->update($request->all());
        $request->session()->flash('updates', 'Record updated successfully');
        return redirect()->back();
    }

    public function export()
    {
        $type = 'xls';
        return Excel::download(new RecieptViewExport, 'Reciepts.' . $type);
    }
}
