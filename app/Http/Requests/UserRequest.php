<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        if($this->method() == 'PATCH')
        {
            return [
                'name'=>'required',
                'jawatan'=>'required',
                'jabatan'=>'required',
                'fakulti'=>'required',
                'phone'=>'required',
            ];
        }

    }

    public function messages(){

        return [
            'name.required'=>'Sila isi nama',
            'jawatan.required'=>'Sila isi jawatan',
            'jabatan.required'=>'Sila isi jabatan',
            'fakulti.required'=>'Sila isi fakulti',
            'phone.required'=>'Sila isi no telefon',
        ];
    }
}
