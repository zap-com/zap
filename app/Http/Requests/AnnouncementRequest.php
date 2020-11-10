<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
            'title' => 'required|min:8|max:100',
            'description' => 'required',
            'price' => 'required|integer',
            'category_id' => 'required|numeric|min:1',
            'hiddenplace' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve essere più lungo di :min caratteri',
            'title.max' => 'Il titolo non deve superare :max caratteri',
            'description.required' => 'La descrizione è obbligatoria',
            'price.required' => 'Il prezzo è obbligatorio',
            'price.integer' => 'Il prezzo deve essere un numero',
            'category_id.min' => 'Devi selezionare una categoria per il tuo prodotto',
        ];
    }
}
