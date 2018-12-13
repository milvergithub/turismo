<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageContactRequest extends FormRequest
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
            'name' => 'required|alpha',
            'user_id' => 'required',
            'subject'  => 'required',
            'message'  => 'required',
        ];
    }
}
