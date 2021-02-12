<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncomeStoreRequest extends FormRequest
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
            'berat' => 'required|numeric',
            'harga' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'berat.required' => 'Berat harus diisi!',
            'berat.numeric' => 'Berat harus berupa angka!',

            'harga.required' => 'Harga harus diisi!',
            'harga.integer' => 'Harga harus berupa angka!'
        ];
    }
}
