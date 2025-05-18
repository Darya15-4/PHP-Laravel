<?php require(dirname(__DIR__).'/header.php'); ?>
<article>
    <h1><?=$article->getName()?></h1>
    <div class="meta">
        Опубликовано <?=$article->getCreatedAt()?> автором <?=$article->getAuthor()->getName()?>
    </div>
    <p><?=$article->getText()?></p>
    <a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/<?=$article->getId();?>/edit" class="card-link">Редактировать</a>
    <a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/<?=$article->getId();?>/delete" class="card-link">Удалить</a>
</article>

<hr>
<section class="comments">
    <h2>Комментарии</h2>

    <?php foreach ($article->getComments() as $comment): ?>
        <div class="comment" id="comment<?= $comment->getId(); ?>">
            <strong><?= $comment->getAuthor()->getName(); ?>:</strong>
            <p><?= $comment->getText(); ?></p>
            <p class="comment-date"><?= $comment->getCreatedAt(); ?></p>
            <a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/comments/<?= $comment->getId(); ?>/edit" class="btn btn-sm btn-outline-secondary">Редактировать</a>
        </div>
    <?php endforeach; ?>


    <?php if (empty($article->getComments())): ?>
        <p>Пока нет комментариев. Будь первым!</p>
    <?php endif; ?>
</section>

<hr>
<section class="add-comment">
    <h2>Оставить комментарий</h2>
    <form action="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/article/<?= $article->getId(); ?>/comments" method="post">
        <div class="mb-3">
            <label for="text" class="form-label">Комментарий</label>
            <textarea class="form-control" id="text" name="text" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Опубликовать</button>
    </form>
</section>

<?php require(dirname(__DIR__).'/footer.php'); ?>