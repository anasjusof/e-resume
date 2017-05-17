<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LatarBelakangPengajianRequest extends Request
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
                'institusi'=>'required',
                'tahap_kelulusan'=>'required',
                'nama_kelulusan'=>'required',
            ];
        }

    }

    public function messages(){

        return [
            'institusi.required'=>'Sila isi institusi',
            'tahap_kelulusan.required'=>'Sila isi tahap kelulusan',
            'nama_kelulusan.required'=>'Sila isi nama kelulusan',
        ];
    }
}
