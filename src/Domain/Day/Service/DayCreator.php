<?php

namespace App\Domain\Day\Service;

use App\Domain\Day\Data\DayCreatorData;
use App\Domain\Day\Repository\DayGeneratorRepository;
//use App\Domain\Day\Validator\DayValidator;
use App\Factory\LoggerFactory;
use App\Interfaces\ServiceInterface;
use Psr\Log\LoggerInterface;
use Selective\Validation\Exception\ValidationException;

/**
 * Domain Service.
 */
final class DayCreator implements ServiceInterface
{
    /**
     * @var ConsGeneratorRepository
     */
    private $repository;

    /**
     * @var ConsValidator
     */
    protected $dayValidator;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * The constructor.
     *
     * @param ConsGeneratorRepository $repository The repository
     * @param ConsValidator $userValidator The user validator
     * @param LoggerFactory $loggerFactory The logger factory
     */
    public function __construct(
        DayGeneratorRepository $repository,
        DayValidator $dayValidator,
        LoggerFactory $loggerFactory
    ) {
        $this->repository = $repository;
        $this->dayValidator = $dayValidator;
        $this->logger = $loggerFactory
            ->addFileHandler('day_creator.log')
            ->createInstance('day_creator');
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
    public function createDay(DayCreatorData $day): int
    {
        // Validation
        $validation = $this->dayValidator->validateDay($day);

        if ($validation->isFailed()) {
            $validation->setMessage(__('Sprawdź dane, które wstawiłeś'));

            throw new ValidationException($validation);
        }

        // Insert user
        $dayId = $this->repository->insertDay($day);
        $dayId = $this->repository->insertDay2($day);

        // Logging
        $this->logger->info(__('Dzień wstawiony poprawnie: %s', $dayId));

        return $dayId;
    }
}
