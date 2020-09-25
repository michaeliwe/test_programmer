<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LearningActivityRequest extends FormRequest
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
            'name' => 'required|string',
            'method_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date'
        ];
    }
}
