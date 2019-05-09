<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reciept;

class RecieptController extends Controller
{
    //

    public function show($id) {
        $reciept = Reciept::findOrFail($id);
        return view('admin.invoice.reciept' , compact('reciept'));
    }
}
