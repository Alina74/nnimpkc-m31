<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserValidation extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'login'=>'nullable',
            'password'=>'nullable|min:6|confirmed',
            'fullname'=>'required|regex:/^[АБВГДЕЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдежзийклмнопрстуфхцчшщъыьэюя\s]+$/',
            'country'=>'nullable',
            'city'=>'nullable',
            'hobbies'=>'nullable',
            'birthday'=>'nullable',
            'photo_file'=>'nullable|max:2048|file|image',
        ];
    }
}
