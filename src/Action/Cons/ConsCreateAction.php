<?php

namespace App\Action\Cons;

use App\Domain\Day\Service\DayListDataTable;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
//use App\Action\Subject\SubjectListDataTableAction;

/**
 * Action.
 */
final class ConsCreateAction
{
    /**
     * @var Twig
     */
    private $twig;

    private $dayListDataTable;
    /**
     * The constructor.
     *
     * @param Twig $twig The twig engine
     */
    public function __construct(Twig $twig, DayListDataTable $dayListDataTable)
    {
        $this->twig = $twig;
        $this->dayListDataTable = $dayListDataTable;
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
        // $viewData = [
        //     'now' => date('d.m.Y H:i:s'),
        // ];
        $params = (array)$request->getParsedBody();
        $this->dayListDataTable->listAllDay($params);
        return $this->twig->render($response, 'admin/newCons.twig');
    }
}
