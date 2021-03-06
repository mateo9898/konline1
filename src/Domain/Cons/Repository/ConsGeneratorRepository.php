<?php

namespace App\Domain\Cons\Repository;

use App\Domain\Cons\Data\ConsCreatorData;
use App\Repository\QueryFactory;
use App\Repository\RepositoryInterface;
use App\Repository\TableName;

/**
 * Repository.
 */
class ConsGeneratorRepository implements RepositoryInterface
{
    /**
     * @var QueryFactory The query factory
     */
    private $queryFactory;

    /**
     * Constructor.
     *
     * @param QueryFactory $queryFactory The query factory
     */
    public function __construct(QueryFactory $queryFactory)
    {
        $this->queryFactory = $queryFactory;
    }

    /**
     * Insert user row.
     *
     * @param ConsCreatorData $user The user
     *
     * @return int The new ID
     */
    public function insertCons(ConsCreatorData $cons): int
    {
        $row = [
            'id_consultation' => rand(),
            'start_date' =>$cons->start_date,
            'start_hour' =>$cons->start_hour,
            'subject' => $cons->subject,
            'end_hour' => $cons->end_hour,
            'name' => $cons->name,
            'surname' => $cons->surname,
            'email'=> $cons->email,
            'accept' => $cons->accept,
            'id_user_FK' => $cons->id_user_FK,
            'id_day_FK' => $cons->id_day_FK,
        ];

        return (int)$this->queryFactory->newInsert(TableName::CONSULTATION, $row)->execute()->lastInsertId();
    }
}
