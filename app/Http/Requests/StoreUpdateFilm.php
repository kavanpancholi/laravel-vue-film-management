<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFilm extends FormRequest
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
            'name' => 'required',
            'description' => 'string',
            'release_date' => 'required|date',
            'rating' => 'required|numeric',
            'ticket_price' => 'required|numeric',
            'country_id' => 'required',
            'photo' => 'image',
            'genre' => 'required',
        ];
    }
}
