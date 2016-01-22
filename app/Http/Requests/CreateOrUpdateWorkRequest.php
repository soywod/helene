<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateOrUpdateWorkRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => 'required',
            'category_id' => 'required',
            'width'       => 'required:numeric',
            'height'      => 'required:numeric',
            'box_price'   => 'numeric',
            'unbox_price' => 'numeric',
        ];
    }
}
