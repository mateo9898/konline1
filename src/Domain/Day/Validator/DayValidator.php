<?php

namespace App\Domain\Day\Validator;

use App\Domain\Day\Data\DayCreatorData;
use Selective\Validation\ValidationResult;
use App\Repository\QueryFactory;
/**
 * Validator.
 */
final class DayValidator
{
    /**
     * Validate.
     *
     * @param ConsCreatorData $user The user
     *
     * @return ValidationResult The validation result
     */

    /**
     * @var QueryFactory
     */
    private $queryFactory;

    private $repository;
    /**
     * Constructor.
     *
     * @param QueryFactory $queryFactory The query factory
     */
    public function __construct(QueryFactory $queryFactory)
    {
        $this->queryFactory = $queryFactory;
    }

    // public function dayOfWeek():array
    // {
        
    //     return 
    // }

    public function validateDay(DayCreatorData $cons): ValidationResult
    {
        $validation = new ValidationResult();

        // if (filter_var($cons->email, FILTER_VALIDATE_EMAIL) === false) {
        //     $validation->addError('email', __('Invalid email address'));
        // }

        // $query = $this->queryFactory->newSelect('day')->select('*');
        // $id_day= $query->execute()->fetchAll('assoc');
        
        // switch(sizeof($id_day)){
        //     case 1:
        //         if (date('w',strtotime(($cons->start_date))) != $id_day[0]['id_day']) {
        //             $validation->addError('id_day', __("W tym dniu nie ma konsultacji"));
        //         }
        //     break;
        //     case 2:
        //         if ((date('w',strtotime(($cons->start_date))) != $id_day[0]['id_day']) && (date('w',strtotime(($cons->start_date))) != $id_day[1]['id_day'])) {
        //             $validation->addError('id_day', __("W tym dniu nie ma konsultacji"));
        //         }
        //     break;
        // }
            
        return $validation;
    }
}
