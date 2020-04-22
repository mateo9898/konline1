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
        $query = $this->queryFactory->newSelect('consultation c, subject s')->select('*');

        // $query->select([
        //     'id_consultation',
        //     'start',
        //     'end',
        //     'name',
        //     'surname',
        //     'id_user_FK',
        //     'id_subject_FK',
        // ]);

        // $query->join([
        //     's'=>[
        //     'table' => 'subject',
        //     'alias' => 's',
        //     'type' => 'LEFT',
        //     'conditions' => array(
        //         's.id_subject = id_subject_FK',
        //     )
        //     ],
        //     'd' => [
        //         'table' => 'day',
        //         'alias' => 'd',
        //         'type' => 'INNER',
        //         'conditions' => array(
        //             'd.id_owner2_FK = id_user_FK',
        //         )
        //     ]
        // ]);


        return $this->dataTable->load($query, $params);
    }
}
