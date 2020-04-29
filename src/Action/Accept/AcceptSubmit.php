<?php

namespace App\Action\Accept;

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
final class AcceptSubmit
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


        if(isset($_POST['id_cons4'])&&$_POST['decision']==1){
            $this->sendMail->id_consultation = $_POST['id_cons4'];
            $this->sendMail->topic = "Konsultacje zaakceptowane przez użytkownika";
            $this->sendMail->content = "Użytkownik zaakceptował kondultacje";
            $this->queryFactory->newUpdate('consultation',['accept' => 1])->andWhere(['id_consultation' => $_POST['id_cons4']])->execute();
            $this->sendMail->send();
        }
        if(isset($_POST['id_cons4'])&&$_POST['decision']==0){
            $this->sendMail->id_consultation = $_POST['id_cons4'];
            $this->sendMail->topic = "Konsultacje odrzucone przez użytkownika";
            $this->sendMail->content = "Użytkownik odrzucił konsultacje";
            $this->queryFactory->newDelete('consultation')->andWhere(['id_consultation' => $_POST['id_cons4']])->execute();
            $this->sendMail->send();
        }
        return $this->twig->render($response, 'admin/dashboard.twig');
    }
}
