<?php

namespace App\Domain\Day\Service;

use App\Domain\Cons\Repository\DayListDataTableRepository;
use App\Interfaces\ServiceInterface;

/**
 * Service.
 */
final class DayListDataTable implements ServiceInterface
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
    public function __construct(DayListDataTableRepository $repository)
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
    public function listAllDay(array $params): array
    {
        return $this->repository->getTableData($params);
    }
}
