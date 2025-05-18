<h2>Комментарии</h2>

<?php foreach ($comments as $comment): ?>
    <div id="comment<?= htmlspecialchars($comment->getId()) ?>" class="comment">
        <p><strong><?= htmlspecialchars($comment->getUserId())  ?></strong> написал:</p>
        <p><?= nl2br(htmlspecialchars($comment->getText())) ?></p>
        <p><small><?= htmlspecialchars($comment->getCreatedAt()) ?></small></p>
        
        <?php if ($comment->getUserId() === $_SESSION['user']['id']): ?>
            <a href="/comments/<?= $comment->getId() ?>/edit">Редактировать</a>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<h3>Добавить комментарий</h3>
<form method="POST" action="/articles/<?= $article->getId() ?>/comments">
    <textarea name="text" rows="4" cols="50" required></textarea><br>
    <button type="submit">Отправить</button>
</form>
