<?php

// Define app routes

use App\Middleware\UserAuthMiddleware;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->get('/', \App\Action\Home\HomeAction::class)->setName('root');

    $app->get('/main', \App\Action\Main\MainAction::class)->setName('main');
    
    $app->get('/admin', \App\Action\Admin\AdminAction::class)->setName('admin');

    $app->get('/hello/{name}', \App\Action\Hello\HelloAction::class)->setName('hello');

    $app->post('/api/users', \App\Action\User\UserCreateAction::class)->setName('api-user-create');

    $app->get('/login', \App\Action\Login\LoginAction::class)->setName('login');
    $app->post('/login', \App\Action\Login\LoginSubmitAction::class);

    $app->get('/register', \App\Action\User\UserCreateAction::class)->setName('register');
    $app->post('/register', \App\Action\User\UserSubmitAction::class);

    $app->get('/create-cons', \App\Action\InsertCons\ConsCreateAction::class)->setName('create-cons');
    $app->post('/create-cons', \App\Action\InsertCons\ConsSubmitAction::class);

    $app->get('/mail', \App\Action\Mail\MailAction::class)->setName('mail');

    
    $app->get('/datatable', \App\Action\Cons\ConsListAction::class)->setName('user-list');
    $app->post('/datatable', \App\Action\Cons\ConsListDataTableAction::class)->setName('user-datatable');


    // $app->group('/datatable', function (RouteCollectorProxy $group) {
    //     $group->get('', \App\Action\Cons\ConsListAction::class)->setName('cons-list');
    //     $group->post('/datatable', \App\Action\Cons\ConsListDataTableAction::class)->setName('cons-datatable');
    // })->add(UserAuthMiddleware::class);
    // Password protected area
};
