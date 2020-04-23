<?php

namespace App\Domain\Subject\Service;

use App\Domain\Subject\Repository\SubjectListDataTableRepository;
use App\Interfaces\ServiceInterface;

/**
 * Service.
 */
final class SubjectListDataTable implements ServiceInterface
{
    /**
     * @var SubjectListDataTableRepository
     */
    private $repository;

    /**
     * Constructor.
     *
     * @param SubjectListDataTableRepository $repository The repository
     */
    public function __construct(SubjectListDataTableRepository $repository)
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
    public function listAllSubject(array $params): array
    {
        return $this->repository->getTableData($params);
    }
}
