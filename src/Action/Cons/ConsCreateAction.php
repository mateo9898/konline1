<?php

namespace App\Action\Cons;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use App\Action\Subject\SubjectListDataTableAction;

/**
 * Action.
 */
final class ConsCreateAction
{
    /**
     * @var Twig
     */
    private $twig;

    /**
     * The constructor.
     *
     * @param Twig $twig The twig engine
     */
    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
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

        return $this->twig->render($response, 'admin/newCons.twig');
    }
}
