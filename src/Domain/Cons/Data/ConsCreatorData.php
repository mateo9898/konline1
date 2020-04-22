<?php

namespace App\Domain\Cons\Data;

use App\Interfaces\DataInterface;
use Selective\ArrayReader\ArrayReader;

/**
 * Data object.
 */
final class ConsCreatorData implements DataInterface
{
    /** @var int|null */
    public $id_consultation;

    /** @var string|null */
    public $start;

    /** @var string|null */
    public $end;

    /** @var string|null */
    public $name;

    /** @var string|null */
    public $surname;

    /** @var string|null */
    public $email;

    /** @var int|null */
    public $id_user_FK;

    /** @var int|null */
    public $id_subject_FK;

    /** @var int|null */
    public $id_day_FK;

    /**
     * The constructor.
     *
     * @param array $array The array with data
     */
    public function __construct(array $array = [])
    {
        $data = new ArrayReader($array);
        $this->id_consultation = $data->findInt('id_consultation');
        //$this->id_consultation = 1;
        $this->start = date($data->find('start_date') + " " + $data->find('start_hour'));
        //$this->start =date("1999-01-01 12:11:11");
        $this->end = null;
        //$this->end = date("1999-01-01 12:11:11");
        $this->name = $data->find('name');
        //$this->name = 'Heniekw';
        //$this->surname = 'hen';
        $this->surname = $data->findString('surname');
        $this->email = $data->findString('email');
        //$this->email = 'a@a.pl';
        $this->id_user_FK = 1;
        $this->id_subject_FK = 1;
        $this->id_day_FK = 1;
    }
}
