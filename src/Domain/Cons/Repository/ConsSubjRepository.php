<?php

namespace App\Domain\User\Repository;

use App\Repository\QueryFactory;

/**
 * Repository.
 */
final class ConsRepository
{
    /**
     * @var QueryFactory
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
     * Find user by username.
     *
     * @param string $username Username
     *
     * @return array The user
     */
    public function getConsultation(): array
    {
        $query = $this->queryFactory->newSelect('consultation c', 'subject s');

        $query->select([
            'c.id_consultation',
            'c.start',
            'c.end',
            'c.name',
            'c.surname',
            'c.id_user_FK',
            'c.id_subject_FK',
            's.id_subject',
            's.name',
        ]);

        $query->andWhere([
            's.id_subject' => 'c.id_consultation',
        ]);

        $row = $query->execute()->fetch('assoc');

        return $row ?: [];
    }
}
