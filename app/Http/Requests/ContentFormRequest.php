<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|min:2',
            'email' => 'required|email',
            'subject'=> 'required',
            'message'=> 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'isim soyisim girmeniz gerekiyor',
            'name.string' => 'isim soyisim karakterden oluşmalı',
            'name.min' => 'İsim soyisim en az 2 karakterli olabilir',


            'email.required' => 'email girmeniz gerekiyor',
            'email.email' => 'email formatında girmeniz gerekiyor',


            'subject.required' => 'konu girmeniz gerekiyor',
            'message.required' => 'Mesajınızı girmeniz gerekiyor',

        ];
    }
}
