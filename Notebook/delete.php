<?php
function showDeletePage() {
    $pdo = getPDO();

    if (isset($_GET['id'])) {
        $stmt = $pdo->prepare("SELECT surname FROM contacts WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $contact = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($contact) {
            $pdo->prepare("DELETE FROM contacts WHERE id = ?")->execute([$_GET['id']]);
            echo "<p style='color:green;'>Запись с фамилией {$contact['surname']} удалена</p>";
        } else {
            echo "<p style='color:red;'>Запись не найдена</p>";
        }
    }

    $rows = $pdo->query("SELECT id, surname, name FROM contacts ORDER BY surname, name")->fetchAll(PDO::FETCH_ASSOC);

    echo "<p><strong>Выберите запись для удаления:</strong></p>";
    foreach ($rows as $row) {
        echo "<a href='?action=delete&id={$row['id']}'>{$row['surname']} {$row['name']}</a><br>";
    }
}
