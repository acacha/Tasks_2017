<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class PasswordGrantProxyControllerRequest.
 *
 * @package App\Http\Requests
 */
class PasswordGrantProxyControllerRequest extends FormRequest
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
            'username' => 'required|email|max:255',
            'password' => 'required|min:6',
        ];
    }

}
