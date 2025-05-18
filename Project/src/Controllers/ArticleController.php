<?php

namespace src\Controllers;

use src\View\View;
use src\Models\Articles\Article;
use src\Models\Comments\Comment;

class ArticleController
{
    private View $view;

    public function __construct()
    {
        $this->view = new View;
    }

    public function index(): void
    {
        $articles = Article::findAll();
        $this->view->renderHtml('article/index', ['articles' => $articles]);
    }

    public function show(int $id): void
    {
        $article = Article::getById($id);
        if (!$article) {
            $this->view->renderHtml('error/404', []);
            return;
        }

        $comments = Comment::findByArticleId($id);
        $this->view->renderHtml('article/show', [
            'article'       => $article,
            'comments'      => $comments,
            'currentUserId' => $this->getCurrentUserId(),
        ]);
    }

    public function create(): void
    {
        $this->view->renderHtml('article/create', []);
    }

    public function store(): void
    {
        $article = new Article();
        $article->title    = $_POST['title'] ?? '';
        $article->text     = $_POST['text']  ?? '';
        $article->authorId = $this->getCurrentUserId();
        $article->save();

        header('Location: http://localhost/php-laravel/Project/www/index.php');
        exit;
    }

    public function edit(int $id): void
    {
        $article = Article::getById($id);
        $this->view->renderHtml('article/edit', ['article' => $article]);
    }

    public function update(int $id): void
    {
        $article = Article::getById($id);
        $article->title = $_POST['title'] ?? $article->title;
        $article->text  = $_POST['text']  ?? $article->text;
        $article->save();

        header('Location: http://localhost/php-laravel/Project/www/article/' . $article->getId());
        exit;
    }

    public function delete(int $id): void
    {
        $article = Article::getById($id);
        if ($article) {
            $article->delete();
        }

        header('Location: http://localhost/php-laravel/Project/www/index.php');
        exit;
    }

    public function comments(int $articleId): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: http://localhost/php-laravel/Project/www/article/' . $articleId);
            exit;
        }

        $text = trim($_POST['text'] ?? '');
        if ($text === '') {
            header('Location: http://localhost/php-laravel/Project/www/article/' . $articleId);
            exit;
        }

        $comment = new Comment();
        $comment->setArticleId($articleId);
        $comment->setAuthorId($this->getCurrentUserId());
        $comment->setText($text);
        $comment->save();

        $commentId = $comment->getId();
        header('Location: http://localhost/php-laravel/Project/www/article/' . $articleId . '#comment' . $commentId);
        exit;
    }

    public function editComment(int $commentId): void
    {
        $comment = Comment::getById($commentId);
        if (!$comment) {
            $this->view->renderHtml('error/404', []);
            return;
        }

        if ($comment->getAuthorId() !== $this->getCurrentUserId()) {
            http_response_code(403);
            echo "Доступ запрещён";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $text = trim($_POST['text'] ?? '');
            if ($text === '') {
                header('Location: http://localhost/php-laravel/Project/www/comments/' . $commentId . '/edit');
                exit;
            }

            $comment->setText($text);
            $comment->save();

            header('Location: http://localhost/php-laravel/Project/www/article/' . $comment->getArticleId() . '#comment' . $comment->getId());
            exit;
        }

        $this->view->renderHtml('comment/edit', ['comment' => $comment]);
    }

    private function getCurrentUserId(): int
    {
        return $_SESSION['user']['id'] ?? 1;
    }
}
