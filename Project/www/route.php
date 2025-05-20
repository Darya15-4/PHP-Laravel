<?php


use src\Controllers\ArticleController;
use src\Controllers\MainController;
use src\Controllers\CommentController;

return [
    '~^$~' => [ArticleController::class, 'index'],
    '~article/(\d+)/edit$~' => [ArticleController::class, 'edit'],
    '~article/(\d+)/update$~' => [ArticleController::class, 'update'],
    '~^article/(\d+)$~' => [ArticleController::class, 'show'],
    '~^article/(\d+)/delete$~' => [ArticleController::class, 'delete'],
    '~^article/create$~' => [ArticleController::class, 'create'],
    '~^article/store$~' => [ArticleController::class, 'store'],

    // Комментарии
    '~^article/(\d+)/comments$~' => [CommentController::class, 'store'], // POST для создания комментария
    '~^comments/(\d+)/edit$~' => [CommentController::class, 'edit'],
    '~^comments/(\d+)/update$~' => [CommentController::class, 'update'],

    '~^hello/(.+)$~' => [MainController::class, 'sayHello'],
];
