<?php

namespace App\Domain\Cons\Service;

use App\Domain\Cons\Repository\ConsListDataTableRepository;
use App\Interfaces\ServiceInterface;

/**
 * Service.
 */
final class ConsListDataTable implements ServiceInterface
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
    public function __construct(ConsListDataTableRepository $repository)
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
