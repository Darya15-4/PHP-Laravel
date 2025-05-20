<?php require __DIR__ . '/../header.php'; ?>

<section class="articles">
    <?php foreach ($articles as $article): ?>
        <article class="article">
            <a class="article__title" href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/article/<?= $article->getId(); ?>">
                <?= $article->getName(); ?>
            </a>
            <div class="article__meta">
                Опубликовано <?= $article->getCreatedAt(); ?> автором <?= $article->getAuthor()->getName(); ?>
            </div>
            <p class="article__text"><?= $article->getText(); ?></p>
        </article>
    <?php endforeach; ?>

    <a class="articles__add-button" href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/article/create">Добавить статью</a>
</section>

<?php require __DIR__ . '/../footer.php'; ?>
