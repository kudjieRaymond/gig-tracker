<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            'project_id'  => 'required|integer',
            'transaction_type_id' => 'required|integer',
            'income_source_id' => 'required|integer',
            'amount' => 'required',
            'currency_id' =>'required|integer',
            'transaction_date'  => 'required|date',
        ];
    }
}