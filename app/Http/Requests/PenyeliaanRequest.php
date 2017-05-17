<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PenyeliaanRequest extends Request
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
                'nama'=>'required',
                'no_matrik'=>'required',
                'tajuk'=>'required',
                'status'=>'required',
                'sem'=>'required',
            ];
        }

    }

    public function messages(){

        return [
            'nama.required'=>'Sila isi nama',
            'no_matrik.required'=>'Sila isi no matrik',
            'tajuk.required'=>'Sila isi tajuk',
            'status.required'=>'Sila isi status',
            'sem.required'=>'Sila isi semester',
        ];
    }
}
