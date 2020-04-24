<?php

namespace App\Action\InsertDay;

use App\Domain\Day\Data\DayCreatorData;
use App\Domain\Day\Service\DayCreator;
use App\Responder\Responder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action.
 */
final class DaySubmitAction
{
    /**
     * @var Responder
     */
    private $responder;

    /**
     * @var ConsCreator
     */
    private $dayCreator;

    /**
     * The constructor.
     *
     * @param Responder $responder The responder
     * @param ConsCreator $userCreator The service
     */
    public function __construct(Responder $responder, DayCreator $dayCreator)
    {
        $this->responder = $responder;
        $this->dayCreator = $dayCreator;
    }

    /**
     * Action.
     *
     * > curl -X POST -H "Content-Type: application/json" -d {\"key1\":\"value1\"} http://localhost/users
     *
     * @param ServerRequestInterface $request The request
     * @param ResponseInterface $response The response
     *
     * @return ResponseInterface The response
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        // Collect input from the HTTP request
        $dayData = new DayCreatorData((array)$request->getParsedBody());

        // Invoke the Domain with inputs and retain the result
        $dayId = $this->dayCreator->createDay($dayData);

        // Build the HTTP response
        return $this->responder->encodeJson($response, [
            'day_id' => $dayId,
        ]);
    }
}
