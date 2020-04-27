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
        
        // if(isset($_GET['id_cons'])){
        //     $query=$this->queryFactory->newDelete('consultation')->andWhere(['id' => $_GET['id_cons']]);
        //     $this->dataTable->load($query, $params);
        // }
        $query = $this->queryFactory->newSelect('consultation');
        $query->select([
            'id_consultation',
            'start_date',
            'start_hour',
            'end_hour',
            'name',
            'surname',
            'subject',
            'accept',
            'd.day_name',
            'd.start_cons',
            'd.end_cons',
        ]);

        $query->join([
            'd'=>[
                'table' => 'day',
                'conditions' => 'd.id_day = id_day_FK',
                ]
        ]);


        return $this->dataTable->load($query, $params);
    }
}
