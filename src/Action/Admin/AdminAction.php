<?php

namespace App\Action\Admin;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

use App\Repository\QueryFactory;
use App\Repository\DataTableRepository;
use App\Repository\RepositoryInterface;

use App\Action\Mail\SendMail;


/**
 * Action.
 */
final class AdminAction
{
    /**
     * @var Twig
     */
    private $twig;

    /**
     * @var SendMail
     */
    private $sendMail;


     private $queryFactory;
    private $dataTable;
    /**
     * The constructor.
     *
     * @param Twig $twig The twig engine
     */
    public function __construct(Twig $twig, QueryFactory $queryFactory, DataTableRepository $dataTableRepository, SendMail $sendMail)
    {
        $this->twig = $twig;
        $this->sendMail = $sendMail;
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
            $this->sendMail->id_consultation = $_GET['id_cons'];
            $this->sendMail->topic = "Konsultacje zaakceptowane";
            $this->sendMail->content = "Twoje konsultacje odbędą się w wybranym przez Ciebie terminie";
            $this->queryFactory->newUpdate('consultation',['accept' => 1])->andWhere(['id_consultation' => $_GET['id_cons']])->execute();
            $this->sendMail->send();
        }
        if(isset($_GET['id_cons2'])){
            $this->queryFactory->newDelete('consultation')->andWhere(['id_consultation' => $_GET['id_cons2']])->execute();
        }
        return $this->twig->render($response, 'admin/admin.twig');
    }
}
