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
            "name"=> "required|max:100",
            "description"=> "required|max:500",
            "price"=> "required",

        ];
    }

    public function messages(){
        return
        [
          "name.required"=>"il campo nome dev'essere obbligatorio",
          "description.required"=>"il campo descrizione dev'essere obbligatorio",
          "price.required"=>"il campo prezzo dev'essere obbligatorio",
          "name.max"=>"il campo nome dev'essere massimo di 100 caratteri",
          "description.max"=>"il campo descrizione dev'essere massimo di 500 caratteri",
        ];
    }
}
