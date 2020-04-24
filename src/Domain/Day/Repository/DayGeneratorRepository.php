<?php

namespace App\Domain\Day\Repository;

use App\Domain\Day\Data\DayCreatorData;
use App\Repository\QueryFactory;
use App\Repository\RepositoryInterface;
use App\Repository\TableName;

/**
 * Repository.
 */
class DayGeneratorRepository implements RepositoryInterface
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
    public function insertDay(DayCreatorData $day): int
    {
        $row = [
            'id_day' =>$day->id_day1,
            'day_name' =>$day->day_name1,
            'start_cons' => $day->start_cons,
            'end_cons' => $day->end_cons,
            'id_owner2_FK' => $day->id_owner2_FK,
        ];

        return (int)$this->queryFactory->newInsert(TableName::DAY, $row)->execute()->lastInsertId();
    }
    public function insertDay2(DayCreatorData $day): int
    {
        $row = [
            'id_day' =>$day->id_day2,
            'day_name' =>$day->day_name2,
            'start_cons' => $day->start_cons,
            'end_cons' => $day->end_cons,
            'id_owner2_FK' => $day->id_owner2_FK,
        ];

        return (int)$this->queryFactory->newInsert(TableName::DAY, $row)->execute()->lastInsertId();
    }
}
