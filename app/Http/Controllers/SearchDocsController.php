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
        $docs = Docs::where('en', 'like', '%' . $item['keyword'] . '%')
            ->orWhere('tel_no', 'like', '%' . $item['keyword'] . '%')
            ->orWhere('reg_no', 'like', '%' . $item['keyword'] . '%')
            ->get();
        return view('admin.search.results', compact(['students']));
    }
}
