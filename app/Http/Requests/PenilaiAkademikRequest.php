<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PenilaiAkademikRequest extends Request
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
                'tajuk_projek'=>'required',
                'tahun'=>'required',
                'peringkat'=>'required',
            ];
        }

    }

    public function messages(){

        return [
            'nama.required'=>'Sila isi nama',
            'tajuk_projek.required'=>'Sila isi tajuk projek',
            'tahun.required'=>'Sila isi tahun',
            'peringkat.required'=>'Sila isi peringkat',
        ];
    }
}
