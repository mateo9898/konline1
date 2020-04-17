<?php

namespace App\Domain\Cons\Repository;

use App\Repository\DataTableRepository;
use App\Repository\QueryFactory;
use App\Repository\RepositoryInterface;

/**
 * Repository.
 */
class ConsListDataTableRepository implements RepositoryInterface
{
    /**
     * @var QueryFactory
     */
    private $queryFactory;

    /**
     * @var DataTableRepository
     */
    private $dataTable;

    /**
     * Constructor.
     *
     * @param QueryFactory $queryFactory The query factory
     * @param DataTableRepository $dataTableRepository The repository
     */
    public function __construct(QueryFactory $queryFactory, DataTableRepository $dataTableRepository)
    {
        $this->queryFactory = $queryFactory;
        $this->dataTable = $dataTableRepository;
    }

    /**
     * Load data table entries.
     *
     * @param array $params The user
     *
     * @return array The table data
     */
    public function getTableData(array $params): array
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

        return $this->dataTable->load($query, $params);
    }
}
