<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PenerbitanRequest extends Request
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
        if($this->method() == 'POST' || $this->method() == 'PATCH')
        {
            return [
                'maklumat_penerbitan'=>'required',
                'tahap'=>'required',
            ];
        }

    }

    public function messages(){

        return [
            'maklumat_penerbitan.required'=>'Sila isi maklumat penerbitan',
            'tahap.required'=>'Sila isi tahap',
        ];
    }

}
