<?php

namespace App\Action\EditCons;

use App\Domain\Cons\Data\ConsFewData;
use App\Domain\Cons\Service\ConsCreatorUpdate;
use App\Responder\Responder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
//use App\Domain\Day\Service\DayListDataTable;
use App\Domain\Cons\Service\FewConsListDataTable;
/**
 * Action.
 */
final class EditConsAction
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
     * @var Twig
     */
    private $twig;

    private $fewConsListDataTable;
    /**
     * The constructor.
     *
     * @param Responder $responder The responder
     * @param UserCreator $userCreator The service
     */
    public function __construct(Responder $responder, ConsCreatorUpdate $consCreatorUpdate, Twig $twig,  FewConsListDataTable $fewConsListDataTable)
    {
        $this->twig = $twig;
        $this->responder = $responder;
        $this->consCreatorUpdate = $consCreatorUpdate;
        $this->fewConsListDataTable = $fewConsListDataTable;
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
        $params = (array)$request->getParsedBody();
        $this->responder->encodeJson($response, $this->fewConsListDataTable->listAllCons($params));
        return $this->twig->render($response, 'admin/days.twig');
    }
}
