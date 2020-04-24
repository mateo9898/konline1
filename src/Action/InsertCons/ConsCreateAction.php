<?php

namespace App\Action\InsertCons;

use App\Domain\Cons\Data\ConsCreatorData;
use App\Domain\Cons\Service\ConsCreator;
use App\Responder\Responder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use App\Domain\Day\Service\DayListDataTable;

/**
 * Action.
 */
final class ConsCreateAction
{
    /**
     * @var Responder
     */
    private $responder;

    /**
     * @var ConsCreator
     */
    private $consCreator;
/**
     * @var Twig
     */
    private $twig;

    private $dayListDataTable;
    /**
     * The constructor.
     *
     * @param Responder $responder The responder
     * @param UserCreator $userCreator The service
     */
    public function __construct(Responder $responder, ConsCreator $consCreator, Twig $twig, DayListDataTable $dayListDataTable)
    {
        $this->twig = $twig;
        $this->responder = $responder;
        $this->consCreator = $consCreator;
        $this->dayListDataTable = $dayListDataTable;
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
        $this->dayListDataTable->listAllDay($params);
        return $this->twig->render($response, 'admin/newCons.twig');
    }
}
