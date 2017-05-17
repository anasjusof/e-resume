<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PengajaranRequest extends Request
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
                'kod_kursus'=>'required',
                'nama_kursus'=>'required',
                'sem'=>'required',
                'tahap'=>'required',
                'bil_pelajar'=>'required',
            ];
        }

    }

    public function messages(){

        return [
            'kod_kursus.required'=>'Sila isi kod kursus',
            'nama_kursus.required'=>'Sila isi nama kursus',
            'sem.required'=>'Sila isi semester',
            'tahap.required'=>'Sila isi tahap',
            'bil_pelajar.required'=>'Sila isi bilangan pelajar',
        ];
    }
}
