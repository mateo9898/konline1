<?php

namespace App\Action\InsertDay;

use App\Domain\Day\Data\DayCreatorData;
use App\Domain\Day\Service\DayCreator;
use App\Responder\Responder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
//use App\Domain\Day\Service\DayListDataTable;

/**
 * Action.
 */
final class DayCreateAction
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
     * @var Twig
     */
    private $twig;

    /**
     * The constructor.
     *
     * @param Responder $responder The responder
     * @param UserCreator $userCreator The service
     */
    public function __construct(Responder $responder, DayCreator $dayCreator, Twig $twig)
    {
        $this->twig = $twig;
        $this->responder = $responder;
        $this->consCreator = $consCreator;
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

        return $this->twig->render($response, 'admin/newCons.twig');
    }
}
