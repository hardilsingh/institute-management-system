<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enquiry;

class SearchEnquiryController extends Controller
{
    //

    public function index()
    {
        //
        return view('admin.search_enquiry.index');
    }

    public function search(Request $request)
    {
        $item = $request->all();
        $enquiries = Enquiry::where('name', 'like', '%' . $item['search_result'] . '%')
            ->orWhere('tel_no', 'like', '%' . $item['search_result'] . '%')
            ->get();
        return view('admin.search_enquiry.results', compact('enquiries'));
    }

}
