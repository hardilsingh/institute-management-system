<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docs;

class SearchDocsController extends Controller
{
    //
    public function search(Request $request)
    {
        $item = $request->all();
        $students = Docs::where('name', 'like', '%' . $students->$item['search_docs'] . '%')
            ->orWhere('tel_no', 'like', '%' . $item['search_result'] . '%')
            ->orWhere('reg_no', 'like', '%' . $item['search_result'] . '%')
            ->get();
        return view('admin.search.results', compact(['students']));
    }
}
