<?php

use Main\core\Router;
use Main\core\Middleware\AuthMiddleware;
use Main\core\Middleware\OwnsNoteMiddleware;

$router = new Router();

// Auth
$router->get('auth/login', 'AuthController@showLogin');

$router->post('auth/login', 'AuthController@login');

$router->get('auth/register', 'AuthController@showRegister');
$router->post('auth/register', 'AuthController@register');

$router->post('auth/logout', 'AuthController@logout')
    ->middleware(AuthMiddleware::class);


// Notes
$router->get('', 'NoteController@index')
    ->middleware(AuthMiddleware::class);

$router->get('notes', 'NoteController@index')
    ->middleware(AuthMiddleware::class);

$router->get('note/add', 'NoteController@addNewNote')
    ->middleware(AuthMiddleware::class);

$router->post('note/add', 'NoteController@addNewNote')
    ->middleware(AuthMiddleware::class);

$router->get('note/{id}', 'NoteController@NoteById')
    ->middleware([AuthMiddleware::class, OwnsNoteMiddleware::class]);

$router->get('note/{id}/edit', 'NoteController@edit')
    ->middleware([AuthMiddleware::class, OwnsNoteMiddleware::class]);

$router->post('note/{id}/edit', 'NoteController@updateNote')
    ->middleware([AuthMiddleware::class, OwnsNoteMiddleware::class]);

$router->post('note/{id}/delete', 'NoteController@delete')
    ->middleware([AuthMiddleware::class, OwnsNoteMiddleware::class]);

return $router;
