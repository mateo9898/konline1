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

    $app->get('/mail', \App\Action\Mail\MailAction::class)->setName('mail');

    $app->get('/datatable', \App\Action\User\ConsListAction::class)->setName('cons-list');
    $app->post('/datatable', \App\Action\User\ConsListDataTableAction::class)->setName('cons-datatable');
    // Password protected area
    $app->group('/users', function (RouteCollectorProxy $group) {
        $group->get('', \App\Action\User\UserListAction::class)->setName('user-list');
        $group->post('/datatable', \App\Action\User\UserListDataTableAction::class)->setName('user-datatable');
    })->add(UserAuthMiddleware::class);
};
