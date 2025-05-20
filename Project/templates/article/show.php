<?php require __DIR__ . '/../header.php'; ?>

<article class="article-full">
    <h1 class="article-full__title"><?= $article->getName() ?></h1>
    <div class="article-full__meta">
        Опубликовано <?= $article->getCreatedAt() ?> автором <?= $article->getAuthor()->getName() ?>
    </div>
    <p class="article-full__text"><?= $article->getText() ?></p>

    <div class="article-full__actions">
        <a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/article/<?= $article->getId(); ?>/edit" class="article-full__link">Редактировать</a>
        <a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/article/<?= $article->getId(); ?>/delete" class="article-full__link">Удалить</a>
    </div>
</article>

<hr>

<section class="comments">
    <h2 class="comments__title">Комментарии</h2>

    <?php foreach ($article->getComments() as $comment): ?>
        <div class="comment" id="comment<?= $comment->getId(); ?>">
            <strong class="comment__author"><?= $comment->getAuthor()->getName(); ?>:</strong>
            <p class="comment__text"><?= $comment->getText(); ?></p>
            <p class="comment__date"><?= $comment->getCreatedAt(); ?></p>
            <a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/comments/<?= $comment->getId(); ?>/edit" class="comment__edit-link">Редактировать</a>
        </div>
    <?php endforeach; ?>

    <?php if (empty($article->getComments())): ?>
        <p class="comments__empty">Пока нет комментариев. Будь первым!</p>
    <?php endif; ?>
</section>

<hr>

<section class="add-comment">
    <h2 class="add-comment__title">Оставить комментарий</h2>
    <form class="add-comment__form" action="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/article/<?= $article->getId(); ?>/comments" method="post">
        <div class="add-comment__group">
            <label for="text" class="add-comment__label">Комментарий</label>
            <textarea class="add-comment__textarea" id="text" name="text" rows="3"></textarea>
        </div>
        <button type="submit" class="add-comment__submit">Опубликовать</button>
    </form>
</section>

<?php require __DIR__ . '/../footer.php'; ?>
