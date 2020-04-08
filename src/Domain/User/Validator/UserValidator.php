<?php

namespace App\Domain\User\Validator;

use App\Domain\User\Data\UserCreatorData;
use Selective\Validation\ValidationResult;

/**
 * Validator.
 */
final class UserValidator
{
    /**
     * Validate.
     *
     * @param UserCreatorData $user The user
     *
     * @return ValidationResult The validation result
     */
    public function validateUser(UserCreatorData $user): ValidationResult
    {
        $validation = new ValidationResult();

        // if (empty($user->name)) {
        //     $validation->addError('name', __('Input required'));
        // }




        // if (empty($user->surname)) {
        //     $validation->addError('surname', __('Input required'));
        // }

        // if (empty($user->surname)) {
        //     $validation->addError('surname', __('Input required'));
        // }



        
        if (empty($user->email)) {
            $validation->addError('email', __('Input required'));
        } elseif (filter_var($user->email, FILTER_VALIDATE_EMAIL) === false) {
            $validation->addError('email', __('Invalid email address'));
        }

        return $validation;
    }
}
