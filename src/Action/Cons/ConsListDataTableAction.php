<?php

namespace App\Action\Cons;

use App\Domain\Cons\Service\ConsListDataTable;
use App\Responder\Responder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action.
 */
final class ConsListDataTableAction
{
    /**
     * @var Responder
     */
    private $responder;

    /**
     * @var ConsListDataTable
     */
    private $consListDataTable;

    /**
     * The constructor.
     *
     * @param Responder $responder The responder
     * @param ConsListDataTable $userListDataTable The service
     */
    public function __construct(Responder $responder, ConsListDataTable $consListDataTable)
    {
        $this->responder = $responder;
        $this->consListDataTable = $consListDataTable;
    }

    /**
     * Action.
     *
     * @param ServerRequestInterface $request The request
     * @param ResponseInterface $response The response
     *
     * @return ResponseInterface The response
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $params = (array)$request->getParsedBody();

        return $this->responder->encodeJson($response, $this->consListDataTable->listAllCons($params));
    }
}
