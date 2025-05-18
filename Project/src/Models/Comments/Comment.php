<?php

namespace src\Models\Comments;

use src\Models\ActiveRecordEntity;
use src\Services\Db;

class Comment extends ActiveRecordEntity
{
    protected int $id;
    protected int $authorId;
    protected int $articleId;
    protected string $text;
    protected string $createdAt;

    protected static function getTableName(): string
    {
        return 'comments';
    }

    public static function findByArticleId(int $articleId): array
    {
        $db  = Db::getInstance();
        $sql = 'SELECT * FROM comments WHERE article_id = :article_id ORDER BY created_at ASC';
        return $db->query($sql, [':article_id' => $articleId], static::class);
    }

    public static function getById(int $id): ?self
    {
        $db  = Db::getInstance();
        $sql = 'SELECT * FROM comments WHERE id = :id';
        $rows = $db->query($sql, [':id' => $id], static::class);
        return $rows ? $rows[0] : null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function setArticleId(int $articleId): void
    {
        $this->articleId = $articleId;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }
}
