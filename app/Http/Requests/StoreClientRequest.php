<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'first_name'=> 'required|max:255',
						'last_name'=> 'required|max:255',
						'email'=>'required|email',
						'phone'=>'nullable',
						'website'=>'nullable|url',
						'status'=>'required|string',
						'status'=>'nullable|string',
						'country'=>'nullable|string',
						'skype'=>'nullable|string'
        ];
    }
}