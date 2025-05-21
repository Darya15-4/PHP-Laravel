<?php

namespace src\Controllers;

use src\View\View;
use src\Models\Articles\Article;
use src\Services\Db;
use src\Models\Comments\Comment;

class ArticleController
{
    private $view;
    private $db;

    public function __construct()
    {
        $this->view = new View;  
        $this->db = Db::getInstance();
    }

    public function index()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('article/index', ['articles' => $articles]);
    }

    public function show(int $id): void
    {
        $article = Article::getById($id);
        if (!$article) {
            http_response_code(404);
            echo 'Статья не найдена';
            return;
        }
        $this->view->renderHtml('article/show', ['article' => $article]);
    }

    public function edit($id)
    {
        $article = Article::getById($id);
        $this->view->renderHtml('article/edit', ['article' => $article]);
    }

    public function update($id)
    {
        $article = Article::getById($id);
        $article->title = $_POST['title'];
        $article->text = $_POST['text'];
        $article->save();
        header('Location: /?route=article/' . $article->getId());
        exit();
    }

    public function create(): void
    {
        $this->view->renderHtml('article/create');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $article = new Article();
            $article->setTitle($_POST['title']);
            $article->setText($_POST['text']);
            $article->setAuthorId(1); 
            $article->save();

            header('Location: /?route=');
            exit();
        } else {
            echo "Метод не поддерживается";
        }
    }

    public function delete(int $id)
    {
        $article = Article::getById($id);

        if ($article === null) {
            http_response_code(404);
            echo 'Статья не найдена';
            return;
        }

        $article->delete();
        header('Location: /?route=');
        exit();
    }
}
