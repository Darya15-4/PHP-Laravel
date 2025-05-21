<?php
namespace src\Models\Comments;

use src\Models\ActiveRecordEntity;
use src\Models\Articles\Article;
use src\Models\Users\User;
use src\Services\Db;

class Comment extends ActiveRecordEntity {
    protected $id;
    protected $authorId;
    protected $articleId;
    protected $text;
    protected $createdAt;

    public static function getTableName(): string {
        return 'comments';
    }
    
    public function getAuthor() {
        return User::getById($this->authorId);
    }

    public function getArticleId() {
        return $this->articleId;
    } 

    public function getArticle() {
        return Article::getById($this->articleId);
    }

    public function getText(): string {
        return $this->text;
    }

    public function getCreatedAt(): string {
        return $this->createdAt;
    }

    public static function getByArticleId(int $articleId): array {
        $all = self::findAll();

        $result = array_filter($all, function (Comment $comment) use ($articleId) {
            return $comment->getArticleId() == $articleId;
        });

        return array_values($result);
    }

    public function setAuthorId(int $authorId): void {
        $this->authorId = $authorId;
    }

    public function setArticleId(int $articleId): void {
        $this->articleId = $articleId;
    }

    public function setText(string $text): void {
        $this->text = $text;
    }

    public function setCreatedAt(string $createdAt): void {
        $this->createdAt = $createdAt;
    }
    public static function findById(int $id): ?self
    {
        return static::getById($id);
    }
    public static function findByColumn(string $column, $value): array
{
    $db = Db::getInstance();;
    $result = $db->query(
        "SELECT * FROM comments WHERE $column = :value",
        [':value' => $value],
        static::class
    );
    return $result ?? [];
}
}
