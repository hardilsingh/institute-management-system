<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEnquiry extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name'=>'required',
            'tel_no'=>'required',
            'address'=>'required',
            'follow_up'=>'required',
            'edu'=>'required',
            'father_name'=>'required',
            'gender'=>'required',
            'batch_id'=>'required',
        ];
    }
}
