<?php

namespace App\Domain\Cons\Service;

use App\Domain\Cons\Repository\FewConsListDataTableRepository;
use App\Interfaces\ServiceInterface;

/**
 * Service.
 */
final class FewConsListDataTable implements ServiceInterface
{
    /**
     * @var ConsListDataTableRepository
     */
    private $repository;

    /**
     * Constructor.
     *
     * @param ConsListDataTableRepository $repository The repository
     */
    public function __construct(FewConsListDataTableRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * List all users.
     *
     * @param array $params The parameters
     *
     * @return array The result
     */
    public function listAllCons(array $params): array
    {
        return $this->repository->getTableData($params);
    }
}
