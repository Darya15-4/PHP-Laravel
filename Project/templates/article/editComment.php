<?php require __DIR__ . '/../header.php'; ?>

<section class="edit-comment">
    <h2>Редактировать комментарий</h2>

    <form action="/?route=comments/<?= $comment->getId(); ?>/update" method="post">
        <div class="edit-comment__group">
            <label for="text" class="edit-comment__label">Текст комментария:</label><br>
            <textarea id="text" name="text" rows="4" cols="60"><?= htmlspecialchars($comment->getText(), ENT_QUOTES); ?></textarea>
        </div>
        <button type="submit" class="edit-comment__submit">Сохранить</button>
    </form>

    <p><a href="/?route=article/<?= $comment->getArticleId(); ?>">← Назад к статье</a></p>
</section>

<?php require __DIR__ . '/../footer.php'; ?>
