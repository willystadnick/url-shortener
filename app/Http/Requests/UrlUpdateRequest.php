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
            'url' => 'unique:urls,url,' . $this->url['hash'] . ',hash',
            'hash' => 'max:16|unique:urls,hash,' . $this->url['hash'] . ',hash',
        ];
    }
}
