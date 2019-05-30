<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docs;
use App\Http\Requests\SearchDocsRequest;

class DocsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.docs.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Docs::findOrFail($id)->update($request->all());
        $request->session()->flash('updated', 'Docs updates successfully');
        return redirect()->back();
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
    }


    public function search(SearchDocsRequest $request) {
        $docs = Docs::whereHas('student', function ($query) use($request) {
            $item = $request->all();
            $query->where('name', 'like', '%' . $item['keyword'] . '%')
            ->orWhere('tel_no', 'like', '%' . $item['keyword'] . '%')
            ->orWhere('reg_no', 'like', '%' . $item['keyword'] . '%');
        })->get();
        return view('admin.docs.index', compact(['docs']));
    } 
}
