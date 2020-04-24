<?php

namespace App\Domain\Cons\Validator;

use App\Domain\Cons\Data\ConsCreatorData;
use Selective\Validation\ValidationResult;

/**
 * Validator.
 */
final class ConsValidator
{
    /**
     * Validate.
     *
     * @param ConsCreatorData $user The user
     *
     * @return ValidationResult The validation result
     */
    public function validateCons(ConsCreatorData $cons): ValidationResult
    {
        $validation = new ValidationResult();



        if (filter_var($cons->email, FILTER_VALIDATE_EMAIL) === false) {
            $validation->addError('email', __('Invalid email address'));
        }

        return $validation;
    }

    // public function dayOfWeek(){
    //     $servername = "localhost";
    //     $username = "root";
    //     $password = "";
    //     $dbname = "phpdb";
    //     $i = 0;
    //     $results = [];

    //     // Create connection
    //     $conn = new mysqli($servername, $username, $password, $dbname);
    //     // Check connection
    //     if ($conn->connect_error) {
    //         die("Connection failed: " . $conn->connect_error);
    //     }

    //     $sql = 'SELECT id_day, day_name FROM day';
    //     $result = $conn->query($sql);

    //     if ($result->num_rows > 0) {
    //         // output data to table
    //         while($row = $result->fetch_assoc()) {
    //             $results[$i]=$row;
    //             $i++;
    //         }
    //     } else {
    //         echo "0 results";
    //     }
    //     $conn->close();
    //     return $results;
    // }
}
