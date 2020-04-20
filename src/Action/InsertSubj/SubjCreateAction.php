<?php

namespace App\Action\InsertSubj;

use App\Domain\Subj\Data\SubjCreatorData;
use App\Domain\Subj\Service\SubjCreator;
use App\Responder\Responder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;


/**
 * Action.
 */
final class SubjCreateAction
{
    /**
     * @var Responder
     */
    private $responder;

    /**
     * @var SubjCreator
     */
    private $subjCreator;
/**
     * @var Twig
     */
    private $twig;
    /**
     * The subjtructor.
     *
     * @param Responder $responder The responder
     * @param UserCreator $userCreator The service
     */
    public function __subjtruct(Responder $responder, SubjCreator $subjCreator, Twig $twig)
    {
        $this->twig = $twig;
        $this->responder = $responder;
        $this->subjCreator = $subjCreator;
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
        return $this->twig->render($response, 'create-subj/login.twig');
    }
}
