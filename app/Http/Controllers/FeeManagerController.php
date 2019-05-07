<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrollment;
use App\FeeManager;
use App\Http\Requests\UpdateFeeRequest;

class FeeManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fees = FeeManager::all()->sortByDesc('created_at');
        return view('admin.feemanager.index', compact('fees'));
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
        $student = FeeManager::findOrFail($id);
        return view('admin.feemanager.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeeRequest $request, $id)
    {
        //
        $input = $request->all();
        if ($input['discounted_fee'] == null) {
            $input['discounted_fee'] = $input['total_fee'] - $input['discount'];
            $input['balance'] = $input['discounted_fee'] - $input['paid_fee'];
        } else {
            $input['balance'] = $input['balance'] -$input['paid_fee'];
        }



        $update_fee = FeeManager::findOrFail($id);
        $update_fee->update($input);
        $request->session()->flash('fee_updated', 'Fee updated successfully.');
        return redirect('/feemanager');
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
}
