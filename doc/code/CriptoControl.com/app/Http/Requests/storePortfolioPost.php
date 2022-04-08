<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePortfolioPost extends FormRequest
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
            'moneda' => 'required|max:50|min:1',
            'precio_compra'=> 'required|max:200|min:1',
            'cantidad'=> 'required|max:200|min:1',
            'fecha_publicacion'=> 'required|date',
        ];
    }
}
