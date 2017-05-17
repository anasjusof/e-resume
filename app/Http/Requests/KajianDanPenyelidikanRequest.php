<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class KajianDanPenyelidikanRequest extends Request
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
        if($this->method() == 'POST')
        {
            return [
                'tajuk'=>'required',
                'senarai_penyelidik'=>'required',
                'tahun_geran'=>'required',
                'sumber'=>'required',
                'status'=>'required',
            ];
        }
        
        if($this->method() == 'PATCH')
        {
            return [
                'tajuk'=>'required',
                'senarai_penyelidik'=>'required',
                'tahun_geran'=>'required',
                'sumber'=>'required',
                'status'=>'required',
            ];
        }
    }

    public function messages(){

        return [
            'tajuk.required'=>'Sila isi tajuk',
            'senarai_penyelidik.required'=>'Sila isi senarai penyelidik',
            'tahun_geran.required'=>'Sila isi geran',
            'sumber.required'=>'Sila isi sumber',
            'status.required'=>'Sila isi status',
        ];
    }
}
