<?php require __DIR__ . '/../header.php'; ?>

<h1>Создать новую статью</h1>

<form method="post" action="/?route=/article/store">
    <label>Заголовок:<br>
        <input type="text" name="title" required>
    </label><br><br>
    <label>Текст:<br>
        <textarea name="text" rows="10" required></textarea>
    </label><br><br>
    <button type="submit">Сохранить</button>
</form>

<?php require __DIR__ . '/../footer.php'; ?>
