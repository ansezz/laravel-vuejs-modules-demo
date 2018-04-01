<?php

namespace Modules\Hello\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelloUpdateRequest extends FormRequest
{
    /**
     * Determine if the hello is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
