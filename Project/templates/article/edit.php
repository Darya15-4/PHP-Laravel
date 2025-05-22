<?php  
require __DIR__ . '/../header.php'; 
?>
<h2 class="edit-title">Редактировать статью</h2>

<form class="edit-form" action="/?route=article/<?= $article->getId() ?>/update" method="post">
    <label class="edit-label">Заголовок:<br>
        <input class="edit-input" type="text" name="title" value="<?= htmlspecialchars($article->getTitle()) ?>" required>
    </label><br><br>
    
    <label class="edit-label">Текст:<br>
        <textarea class="edit-textarea" name="text" rows="10" required><?= htmlspecialchars($article->getText()) ?></textarea>
    </label><br><br>
    
    <button class="edit-button" type="submit">Сохранить</button>
</form>

<p><a class="edit-cancel" href="/?route=article/<?= $article->getId() ?>">Отмена</a></p>
