<?php include __DIR__ . '/../header.html'; ?>

<h1>Список статей</h1>

<!-- Кнопка добавить -->
<p>
    <a href="/?route=/article/create" style="text-decoration: none; background: #28a745; color: white; padding: 8px 12px; border-radius: 4px;">
        ➕ Добавить статью
    </a>
</p>

<!-- Список статей -->
<?php foreach ($articles as $article): ?>
    <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px;">
        <h2>
            <a href="/?route=/article/<?= $article['id'] ?>">
                <?= htmlspecialchars($article['name']) ?>
            </a>
        </h2>
        <p><?= nl2br(htmlspecialchars($article['text'])) ?></p>
    </div>
<?php endforeach; ?>

<?php include __DIR__ . '/../footer.html'; ?>
