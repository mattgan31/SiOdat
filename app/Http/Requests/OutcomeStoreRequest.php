<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutcomeStoreRequest extends FormRequest
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
            'jumlahAyam' => 'required|integer',
            'harga' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'jumlahAyam.required' => 'Jumlah harus diisi!',
            'jumlahAyam.integer' => 'Jumlah harus berupa angka!',

            'harga.required' => 'Harga harus diisi!',
            'harga.integer' => 'Harga harus berupa angka!'
        ];
    }
}
