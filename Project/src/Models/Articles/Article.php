<?php
namespace src\Models\Articles;
use src\Models\ActiveRecordEntity;
use src\Models\Users\User;
use src\Models\Comments\Comment;

class Article extends ActiveRecordEntity {
    protected $id;
    protected $title; 
    protected $text;
    protected $authorId;
    protected $createdAt;

    public static function getTableName(): string {
        return 'articles';
    }
    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function getText() {
        return $this->text;
    }
    public function getAuthor() {
        return User::getById($this->authorId);
    }
    public function getCreatedAt() {
        return $this->createdAt;
    }
    public function setTitle($title): void {
        $this->title = $title;
    }
    public function setText($text): void {
        $this->text = $text;
    }
    public function setAuthorId($authorId): void {
        $this->authorId = $authorId;
    }
    public function setCreatedAt($createdAt): void {
        $this->createdAt = $createdAt;
    }
    public function getComments() {
        $commentModel = new Comment();
        return $commentModel->getByArticleId($this->id);
    }
    
}