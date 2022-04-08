<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePostPublicaciones extends FormRequest
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
            'titulo' => 'required|max:250|min:1',
            'subtitulo'=> 'required|max:250|min:1',
            'contenido'=> 'required|max:2000|min:1',
            'categoria_id'=> 'required|exists:categorias,id',
        ];
    }
}
