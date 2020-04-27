<?php

namespace App\Action\EditCons;

use App\Domain\Cons\Data\ConsFewData;
use App\Domain\Cons\Service\ConsCreatorUpdate;
use App\Responder\Responder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action.
 */
final class EditSubmitAction
{
    /**
     * @var Responder
     */
    private $responder;

    /**
     * @var ConsCreator
     */
    private $consCreatorUpdate;

    /**
     * The constructor.
     *
     * @param Responder $responder The responder
     * @param ConsCreator $userCreator The service
     */
    public function __construct(Responder $responder, ConsCreatorUpdate $consCreatorUpdate)
    {
        $this->responder = $responder;
        $this->consCreatorUpdate = $consCreatorUpdate;
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
        $consData = new ConsFewData((array)$request->getParsedBody());

        // Invoke the Domain with inputs and retain the result
        $consId = $this->consCreatorUpdate->createCons($consData);

        // Build the HTTP response
        return $this->responder->encodeJson($response, [
            'cons_id' => $dconsId,
        ]);
    }
}
