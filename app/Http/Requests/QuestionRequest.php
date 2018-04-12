<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'question' => 'required|max:1000',
            'answer' => 'sometimes|required|max:1000',
            'author' => 'required|max:50',
            'email' => 'required|email|max:50',
            'topic_id' => 'required'
        ];
    }
}
