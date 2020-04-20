<?php

namespace App\Action\InsertSubj;

use App\Domain\Subj\Data\SubjCreatorData;
use App\Domain\Subj\Service\SubjCreator;
use App\Responder\Responder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action.
 */
final class SubjSubmitAction
{
    /**
     * @var Responder
     */
    private $responder;

    /**
     * @var SubjCreator
     */
    private $subjCreator;

    /**
     * The constructor.
     *
     * @param Responder $responder The responder
     * @param ConsCreator $userCreator The service
     */
    public function __construct(Responder $responder, SubjCreator $subjCreator)
    {
        $this->responder = $responder;
        $this->subjCreator = $subjCreator;
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
        $subjData = new SubjCreatorData((array)$request->getParsedBody());

        // Invoke the Domain with inputs and retain the result
        $subjId = $this->subjCreator->createSubj($subjData);

        // Build the HTTP response
        return $this->responder->encodeJson($response, [
            'subj_id' => $subjId,
        ]);
    }
}
