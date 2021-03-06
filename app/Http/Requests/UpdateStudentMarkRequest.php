<?php

namespace App\Http\Requests;

use App\Traits\ApiFailResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentMarkRequest extends FormRequest
{
    use ApiFailResponseTrait;

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
            'mark'              => 'required|int|min:0|max:1000'
        ];
    }
}
