<?php require __DIR__ . '/../header.php'; ?>

<section class="add-comment">
    <h2>Оставить комментарий</h2>
    <form action="/?route=article/<?= $article->getId(); ?>/comments" method="post">
        <textarea name="text" rows="3" cols="50"></textarea><br>
        <button type="submit">Опубликовать</button>
    </form>
</section>
<?php require __DIR__ . '/../footer.php'; ?>
