<h2>Редактировать статью</h2>

<form action="/comments/<?= $comment->getId() ?>/update" method="post">
    <textarea name="text" rows="4" cols="50"><?= htmlspecialchars($comment->getText()) ?></textarea><br>
    <button type="submit">Сохранить</button>
</form>

<p><a href="/article/<?= $comment->getArticleId() ?>#comment<?= $comment->getId() ?>">Отмена</a></p>
