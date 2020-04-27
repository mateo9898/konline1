<?php

// Define app routes

use App\Middleware\UserAuthMiddleware;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {

    //====================== STRONA GŁÓWNA ========================================
    $app->get('/', \App\Action\Cons\ConsAction::class)->setName('main');
    $app->post('/', \App\Action\Cons\ConsListDataTableAction::class)->setName('cons-datatable');

    //================== DODAWANIE KONSULTACJI ====================================
    $app->get('/add', \App\Action\InsertCons\ConsCreateAction::class)->setName('add');
    $app->post('/add', \App\Action\InsertCons\ConsSubmitAction::class);

    //======================== LOGOWANIE ==========================================
    $app->get('/login', \App\Action\Login\LoginAction::class)->setName('login');
    $app->post('/login', \App\Action\Login\LoginSubmitAction::class);

    //====================== DNI KONSULTACJI =======================================
    $app->get('/days', \App\Action\InsertDay\DayCreateAction::class)->setName('days');
    $app->post('/days', \App\Action\InsertDay\DaySubmitAction::class);

    //====================== ADMIN =======================================
    $app->get('/admin', \App\Action\Admin\AdminAction::class)->setName('admin');
    $app->post('/admin', \App\Action\Cons\ConsListDataTableAction::class)->setName('cons-datatable');

    //====================== ACCEPT =======================================
    // $app->get('/accept', \App\Action\InsertDay\DayCreateAction::class)->setName('accept');
    // $app->post('/accept', \App\Action\InsertDay\DaySubmitAction::class)->setName('cons-datatable');



    $app->get('/hello/{name}', \App\Action\Hello\HelloAction::class)->setName('hello');

    $app->post('/api/users', \App\Action\User\UserCreateAction::class)->setName('api-user-create');

    $app->get('/register', \App\Action\User\UserCreateAction::class)->setName('register');
    $app->post('/register', \App\Action\User\UserSubmitAction::class);

    

    $app->get('/mail', \App\Action\Mail\MailAction::class)->setName('mail');

    $app->get('/users', \App\Action\User\UserListAction::class)->setName('uesrs');
    $app->post('/users', \App\Action\User\UserListDataTableAction::class)->setName('uesrs');

    $app->get('/datatable', \App\Action\Cons\ConsListAction::class)->setName('user-list');
    $app->post('/datatable', \App\Action\Cons\ConsListDataTableAction::class)->setName('user-datatable');

    $app->get('/old', \App\Action\Home\HomeAction::class)->setName('root');
    $app->get('/home', \App\Action\Main\MainAction::class)->setName('home');


    // $app->group('/datatable', function (RouteCollectorProxy $group) {
    //     $group->get('', \App\Action\Cons\ConsListAction::class)->setName('cons-list');
    //     $group->post('/datatable', \App\Action\Cons\ConsListDataTableAction::class)->setName('cons-datatable');
    // })->add(UserAuthMiddleware::class);
    // Password protected area
};