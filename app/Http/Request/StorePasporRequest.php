<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePasporRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'nama_pemohon' => 'required|string|max:255',
            'nik'          => 'required|string|size:16|unique:paspors,nik',
            'jenis_paspor' => 'required|in:Biasa,Elektronik',
        ];
    }

    public function messages()
    {
        return [
            'nik.unique' => 'NIK sudah terdaftar dalam sistem.',
            'jenis_paspor.in' => 'Pilihan jenis paspor tidak valid.',
        ];
    }
}