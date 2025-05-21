<?php  
require __DIR__ . '/../header.php'; 
?>

<section class="articles">
    <?php foreach ($articles as $article): ?>
        <article class="article">
            <a class="article__title" href="?route=/article/<?= $article->getId(); ?>">
                <?= htmlspecialchars($article->getTitle(), ENT_QUOTES, 'UTF-8'); ?>
            </a>
            <div class="article__meta">
                Опубликовано <?= htmlspecialchars($article->getCreatedAt(), ENT_QUOTES, 'UTF-8'); ?> 
                автором <?= htmlspecialchars($article->getAuthor()->getName(), ENT_QUOTES, 'UTF-8'); ?>
            </div>
            <p class="article__text"><?= nl2br(htmlspecialchars($article->getText(), ENT_QUOTES, 'UTF-8')); ?></p>
        </article>
    <?php endforeach; ?>
    
    <a href="?route=/article/create">Добавить статью</a>
</section>

<?php 
require __DIR__ . '/../footer.php'; 
?>
