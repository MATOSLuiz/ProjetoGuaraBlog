<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePostagens extends FormRequest
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
            'titulo'=> 'required|min:6|max:150',
            'subtitulo'=>'min:6|max:200',
            'texto'=>'required|min:50',
            'imagem'=>'nullable|image'
        ];
    }
}
