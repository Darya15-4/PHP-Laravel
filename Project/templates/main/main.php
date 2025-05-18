<?php include __DIR__ . '/../header.php'; ?>

<?php foreach ($articles as $article): ?>
    <h2><a href="/articles/<?= $article['id'] ?>"><?= htmlspecialchars($article['name']) ?></a></h2>
    <p><?= nl2br(htmlspecialchars($article['text'])) ?></p>
    <hr>
<?php endforeach; ?>

<?php include __DIR__ . '/../footer.php'; ?>
