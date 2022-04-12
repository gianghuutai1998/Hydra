<?php

namespace App\Modules\User\Requests;

use App\Modules\BaseRequest;

class CreateUserRequest extends BaseRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'      => 'required|max:50',
            'email'     => 'required|email|max:255|unique:users,email',
            'password'  => 'required|between:8,32',
            'type'      => 'required|in:0,1'
        ];
    }

    public function messages()
    {
        return self::$_message_format;
    }
}
