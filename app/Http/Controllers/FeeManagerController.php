<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrollment;
use App\FeeManager;
use App\Http\Requests\UpdateFeeRequest;
use App\Reciept;

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
        $fees = FeeManager::orderBy('created_at', 'DESC')->paginate(10);
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
    public function edit($slug)
    {
        //
        $student = FeeManager::where('slug', $slug)->first();
        $feeReciepts = Reciept::where('enrollment_id', $student->enrollment_id)->get();
        return view('admin.feemanager.edit', compact(['student', 'feeReciepts']));
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
        $update_fee = FeeManager::findOrFail($id);
        $input = $request->all();
        if ($input['discounted_fee'] == null) {
            $input['discounted_fee'] = ($input['total_fee'] + $input['total_fee1']) - $input['discount'];
            $input['balance'] = $input['discounted_fee'] - $input['paid_fee'];
        } else {
            $input['balance'] = $input['balance'] - $input['paid_fee'];
        }
        $update_fee->update($input);
        $update_fee->sms($update_fee->student->tel_no, $update_fee->paid_fee, $update_fee->balance, $update_fee->due_date);
        $request->session()->flash('fee_updated', 'Fee updated successfully.');
        
        
        $reciept = Reciept::orderBy('created_at', 'desc')->first();

        $create_reciept = new Reciept([
            'enrollment_id' => $input['enrollment_id'],
            'total_fee' => $input['total_fee'],
            'balance' => $input['balance'],
            'discount' => $input['discount'],
            'paid_fee' => $input['paid_fee'],
            'due_date' => $input['due_date'],
            'number' => $reciept->number + 1,
        ]);
        $update_fee->feereciept()->save($create_reciept);

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


    public function checkdues()
    {
        $fees = FeeManager::where('balance', '>', '0')
        ->orWhere('discount' , null)
        ->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.feemanager.dues', compact('fees'));
    }
}
