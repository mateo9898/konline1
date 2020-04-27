<?php

namespace App\Action\Admin;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

use App\Repository\QueryFactory;
use App\Repository\DataTableRepository;
use App\Repository\RepositoryInterface;

/**
 * Action.
 */
final class AdminAction
{
    /**
     * @var Twig
     */
    private $twig;

     private $queryFactory;
    private $dataTable;
    /**
     * The constructor.
     *
     * @param Twig $twig The twig engine
     */
    public function __construct(Twig $twig, QueryFactory $queryFactory, DataTableRepository $dataTableRepository)
    {
        $this->twig = $twig;
        
        $this->queryFactory = $queryFactory;
        $this->dataTable = $dataTableRepository;
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

        if(isset($_GET['id_cons'])){
            $this->queryFactory->newUpdate('consultation',['accept' => 1])->andWhere(['id_consultation' => $_GET['id_cons']])->execute();
        }
        if(isset($_GET['id_cons2'])){
            $this->queryFactory->newDelete('consultation')->andWhere(['id_consultation' => $_GET['id_cons2']])->execute();
        }
        return $this->twig->render($response, 'admin/admin.twig');
    }
}
