<?php

namespace App\Domain\Cons\Service;

use App\Domain\Cons\Data\ConsFewData;
use App\Domain\Cons\Repository\ConsGeneratorRepositoryUpdate;
use App\Domain\Cons\Validator\ConsValidator;
//use App\Factory\LoggerFactory;
use App\Interfaces\ServiceInterface;
//use Psr\Log\LoggerInterface;
use Selective\Validation\Exception\ValidationException;

/**
 * Domain Service.
 */
final class ConsCreatorUpdate implements ServiceInterface
{
    /**
     * @var ConsGeneratorRepository
     */
    private $repository;

    /**
     * @var ConsValidator
     */
    protected $consValidator;

    /**
     * @var LoggerInterface
     */
    // /private $logger;

    /**
     * The constructor.
     *
     * @param ConsGeneratorRepository $repository The repository
     * @param ConsValidator $userValidator The user validator
     * @param LoggerFactory $loggerFactory The logger factory
     */
    public function __construct(
        ConsGeneratorRepositoryUpdate $repository,
        ConsValidator $consValidator
        //LoggerFactory $loggerFactory
    ) {
        $this->repository = $repository;
        $this->consValidator = $consValidator;
        // $this->logger = $loggerFactory
        //     ->addFileHandler('cons_creator.log')
        //     ->createInstance('cons_creator');
    }

    /**
     * Create a new user.
     *
     * @param ConsCreatorData $user The user data
     *
     * @throws ValidationException
     *
     * @return int The new user ID
     */
    public function createCons(ConsFewData $cons): int
    {
        // Validation
        $validation = $this->consValidator->validateCons1($cons);

        if ($validation->isFailed()) {
            $validation->setMessage(__('Sprawdz wprowadzone dane'));

            throw new ValidationException($validation);
        }

        // Insert user
        $this->repository->updateCons($cons);

        // Logging
        //$this->logger->info(__('Consultacje stworzone poprawnie: %s', $consId));

        return 1;
    }
}
