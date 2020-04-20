<?php

namespace App\Domain\Subj\Data;

use App\Interfaces\DataInterface;
use Selective\ArrayReader\ArrayReader;

/**
 * Data object.
 */
final class SubjCreatorData implements DataInterface
{
    /** @var int|null */
    public $id_user;

    /** @var string|null */
    public $name;

    /** @var string|null */
    public $password;

    /** @var string|null */
    public $email;

    /** @var string|null */
    public $surname;

    /** @var string|null */
    public $role = 'ROLE_USER';

    /**
     * The constructor.
     *
     * @param array $array The array with data
     */
    public function __construct(array $array = [])
    {
        $data = new ArrayReader($array);

        $this->id_user = $data->findInt('id_user');
        $this->name = $data->findString('name');
        $this->password = $data->findString('password');
        $this->surname = $data->findString('surname');
        $this->email = $data->findString('email');
        $this->role = $data->findString('role');
    }
}
