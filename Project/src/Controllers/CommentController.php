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
        return header('Location:http://localhost/php/project/www/article/'.$comment->getArticleId(). '#comment' . $commentId);
    }
}