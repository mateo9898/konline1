<?php

namespace App\Action\Subject;

use App\Domain\Subject\Service\SubjectListDataTable;
use App\Responder\Responder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action.
 */
final class SubjectListDataTableAction
{
    /**
     * @var Responder
     */
    private $responder;

    /**
     * @var SubjectListDataTable
     */
    private $SubjectListDataTable;

    /**
     * The constructor.
     *
     * @param Responder $responder The responder
     * @param SubjectListDataTable $userListDataTable The service
     */
    public function __construct(Responder $responder, SubjectListDataTable $subjectListDataTable)
    {
        $this->responder = $responder;
        $this->subjectListDataTable = $subjectListDataTable;
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

        return $this->responder->encodeJson($response, $this->subjectListDataTable->listAllSubject($params));
    }
}
