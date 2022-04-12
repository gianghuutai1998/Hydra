<?php

namespace App\Modules;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class BaseRequest extends FormRequest
{
    protected static $_message_format = [
        'required'      => ':attribute_is_requrired',
        'unique'        => ':attribute_unique',
        'email'         => ':attribute_email_invalid',
        'max'           => ':attribute_is_max_:max',
        'min'           => ':attribute_is_min_:min',
        'in'            => ':attribute_incorrect',
        'numeric'       => ':attribute_numeric',
        'alpha_num'     => ':attribute_alpha_num',
        'between'       => ':attribute_outside_length_:min-:max',
        'confirmed'     => ':attribute_comfirm_not_match',
        'exists'        => ':attribute_not_exists',
        'date'          => ':attribute_date_invalid',
        'valid_date'    => ':attribute_date_invalid',
        'date_format'   => ':attribute_date_invalid',
        'regex'         => ':attribute_format_incorrect',
        'url'           => ':attribute_url_incorrect',
        'array'         => ':attribute_not_array',
    ];

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json([
                'status' => '400',
                'message' => __('message.BAD_REQUEST.msg'),
                'result' => $errors,
            ], '400')
        );
    }
}
