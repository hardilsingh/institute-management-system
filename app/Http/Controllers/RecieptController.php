<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reciept;
use App\Enrollment;

class RecieptController extends Controller
{
    //

    public function show($id) {
        $reciept = Reciept::findOrFail($id);
        $student = Enrollment::findOrFail($reciept->enrollment_id);
        return view('admin.invoice.reciept' , compact(['reciept' , 'student']));
    }
}
