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

    /**
     * The constructor.
     *
     * @param array $array The array with data
     */
    public function __construct(array $array = [])
    {
        $data = new ArrayReader($array);
        $pom=strtotime("d",$data->findString('start_date'));
        $pom1=$data->findString('start_hour');
        $pom3=$pom+$pom1;
        $this->id_consultation = $data->findInt('id_consultation');
        //$this->id_consultation = 1;
        $this->start = date($pom3);
        //$this->start =date("1999-01-01 12:11:11");
        $this->end = date($data->findString('start'));
        //$this->end = date("1999-01-01 12:11:11");
        $this->name = $data->findString('name');
        //$this->name = 'Heniekw';
        //$this->surname = 'hen';
        $this->surname = $data->findString('surname');
        $this->email = $data->findString('email');
        //$this->email = 'a@a.pl';
        $this->id_user_FK = 1;
        $this->id_subject_FK = 1;
    }
}
