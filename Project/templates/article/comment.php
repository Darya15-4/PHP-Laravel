<?php require __DIR__ . '/../header.php'; ?>

<section class="comment-edit">
    <h2 class="comment-edit__title">Редактировать комментарий</h2>
    <form class="comment-edit__form" action="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/comments/<?= $comment->getId(); ?>/update" method="post">
        <div class="comment-edit__group">
            <label for="text" class="comment-edit__label">Комментарий</label>
            <textarea class="comment-edit__textarea" id="text" name="text" rows="3"><?= htmlspecialchars($comment->getText()) ?></textarea>
        </div>
        <button type="submit" class="comment-edit__submit">Сохранить изменения</button>
    </form>
</section>

<?php require __DIR__ . '/../footer.php'; ?>
