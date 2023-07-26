<?php

namespace App\Validations;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class InputDataValidation
{
    /**
     * @throws ValidationException
     */
    public static function validate(string $attribute, $value, array $rules)
    {
        $validator = Validator::make([$attribute => $value], [$attribute => $rules]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    /**
     * @throws ValidationException
     */
    public static function throwException(string $attribute, string $message, array $messageParams = [])
    {
        throw ValidationException::withMessages([$attribute => __($message, $messageParams)]);
    }
}
