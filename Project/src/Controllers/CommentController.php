<?php
namespace src\Controllers;
use src\View\View;
use src\Services\Db;
use src\Models\Articles\Article;
use src\Models\Comments\Comment;

class CommentController {
    private $view;
    private $db;
    public function __construct() {
        $this->view = new View;
        $this->db = Db::getInstance();
    }

    public function edit($id){
        $comment = Comment::getById($id);
        $this->view->renderHtml('comments/edit', ['comment'=>$comment]);
    }
    
    public function update($id){
        $comment = Comment::getById($id);
        $comment->text = $_POST['text'];
        $comment->save();
        
        $commentId = $comment->getId();
        header('Location: /?route=article/' . $comment->getArticleId() . '#comment' . $commentId);
        exit();
    }
     public function store(int $articleId): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo 'Метод не поддерживается';
            return;
        }

        $text = trim($_POST['text'] ?? '');

        if ($text === '') {
            header('Location: /?route=article/' . $articleId);
            exit();
        }

        $comment = new Comment();
        $comment->setArticleId($articleId);
        $comment->setText($text);
        $comment->setAuthorId(1); 
        $comment->setCreatedAt(date('Y-m-d H:i:s'));
        $comment->save();

        header('Location: /?route=article/' . $articleId . '#comments');
        exit();
    }
}