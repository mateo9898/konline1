<?php

namespace App\Domain\Day\Data;

use App\Interfaces\DataInterface;
use Selective\ArrayReader\ArrayReader;

/**
 * Data object.
 */
final class DayCreatorData implements DataInterface
{
    /** @var int|null */
    public $id_day1;

    public $id_day2;

    /** @var string|null */
    public $day_name1;

    public $day_name2;
    /** @var string|null */
    public $start_cons;

    /** @var string|null */
    public $end_cons;

    
    /** @var int|null */
    public $id_owner2_FK;
    /**
     * The constructor.
     *
     * @param array $array The array with data
     */
    public function __construct(array $array = [])
    {
        $data = new ArrayReader($array);
        if($data->find('day_name1')=='poniedziałek'){
            $this->id_day1=1;
        } else if ($data->find('day_name1')=='wtorek'){
            $this->id_day1=2;
        } else if ($data->find('day_name1')=='środa'){
            $this->id_day1=3;
        } else if ($data->find('day_name1')=='czwartek'){
            $this->id_day1=4;
        } else {
            $this->id_day1=5;
        }     
        if($data->find('day_name2')=='poniedziałek'){
            $this->id_day2=1;
        } else if ($data->find('day_name2')=='wtorek'){
            $this->id_day2=2;
        } else if ($data->find('day_name2')=='środa'){
            $this->id_day2=3;
        } else if ($data->find('day_name2')=='czwartek'){
            $this->id_day2=4;
        } else {
            $this->id_day2=5;
        } 
        $this->day_name1=$data->find('day_name1');
        $this->day_name2=$data->find('day_name2');
        $this->start_cons=$data->find('start_cons');
        $this->end_cons=$data->find('end_cons');
        $this->id_owner2_FK=1;
    }
}
