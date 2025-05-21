<h2>Редактировать статью</h2>

<form action="/?route=article/<?= $article->getId() ?>/update" method="post">
    <label>Заголовок:<br>
        <input type="text" name="title" value="<?= htmlspecialchars($article->getTitle()) ?>" required>
    </label><br><br>
    
    <label>Текст:<br>
        <textarea name="text" rows="10" required><?= htmlspecialchars($article->getText()) ?></textarea>
    </label><br><br>
    
    <button type="submit">Сохранить</button>
</form>

<p><a href="/?route=article/<?= $article->getId() ?>">Отмена</a></p>
