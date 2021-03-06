<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlUpdateRequest extends FormRequest
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
            'url' => 'unique:urls,url,' . $this->request->get('hash') . ',hash',
            'hash' => 'unique:urls,hash,' . $this->request->get('hash') . ',hash',
            'pass' => 'required',
        ];
    }
}
