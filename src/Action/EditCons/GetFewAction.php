<?php

namespace App\Action\EditCons;

use App\Domain\Cons\Service\FewConsListDataTable;
use App\Responder\Responder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action.
 */
final class GetFewAction
{
    /**
     * @var Responder
     */
    private $responder;

    /**
     * @var ConsListDataTable
     */

    private $fewConsListDataTable;
    /**
     * The constructor.
     *
     * @param Responder $responder The responder
     * @param ConsListDataTable $userListDataTable The service
     */
    public function __construct(Responder $responder, FewConsListDataTable $fewConsListDataTable)
    {
        $this->responder = $responder;
        $this->fewConsListDataTable = $fewConsListDataTable;
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

        return $this->responder->encodeJson($response, $this->fewConsListDataTable->listAllCons($params));
    }
}
