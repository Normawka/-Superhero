<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuperheroRequest extends FormRequest
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
        $rules = [
            'nickname'=>'required|min:1|max:255',
            'real_name'=>'min:1|max:255',
            'origin_description'=>'min:1|max:500',
            'superpowers'=>'min:2|max:255',
            'catch_phrase'=>'min:2|max:255',
            'photos' => 'array',
            'photos.*' => 'image|mimes:jpeg,bmp,png|max:2000'
        ];
//        $photos = count($this->input('photos'));
//        foreach(range(0, $photos) as $index) {
//            $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
//        }
        return $rules;
    }
    public function messages()
    {
        return[
            'required' => 'Field :attribute is required' ,
            'min' => 'Field :attribute  must have at least :min characters',
            'max' => 'Field :attribute must have a maximum of :max characters',
            'numeric' => 'Field :attribute field must only contain numbers',
            'unique' => 'Such :attribute exists enter other data',
            'image' => 'Upload :attribute pictures only',
            'mimes' => 'Download only jpeg, bmp, png',
        ];
    }
}
