<?php
function showEditForm() {
    $pdo = getPDO();

    $contacts = $pdo->query("SELECT id, surname, name FROM contacts ORDER BY surname, name")->fetchAll(PDO::FETCH_ASSOC);

    $selectedId = $_GET['id'] ?? ($contacts[0]['id'] ?? null);
    echo "<p><strong>Выберите запись для редактирования:</strong></p>";
    foreach ($contacts as $contact) {
        $style = ($contact['id'] == $selectedId) ? "style='font-weight:bold;'" : "";
        echo "<a href='?action=edit&id={$contact['id']}' $style>{$contact['surname']} {$contact['name']}</a><br>";
    }

    if (!$selectedId) return;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $pdo->prepare("UPDATE contacts SET surname = :surname, name = :name, lastname = :lastname, gender = :gender,
            birthdate = :birthdate, phone = :phone, address = :address, email = :email, comment = :comment WHERE id = :id");
        $ok = $stmt->execute([
            ':surname' => $_POST['surname'],
            ':name' => $_POST['name'],
            ':lastname' => $_POST['lastname'],
            ':gender' => $_POST['gender'],
            ':birthdate' => $_POST['birthdate'],
            ':phone' => $_POST['phone'],
            ':address' => $_POST['address'],
            ':email' => $_POST['email'],
            ':comment' => $_POST['comment'],
            ':id' => $selectedId
        ]);
        echo $ok ? "<p style='color:green;'>Запись обновлена</p>" : "<p style='color:red;'>Ошибка обновления</p>";
    }

    $stmt = $pdo->prepare("SELECT * FROM contacts WHERE id = ?");
    $stmt->execute([$selectedId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) return;

    echo '<form method="post">';
    echo '<p>Фамилия: <input name="surname" value="'.htmlspecialchars($row['surname']).'"></p>';
    echo '<p>Имя: <input name="name" value="'.htmlspecialchars($row['name']).'"></p>';
    echo '<p>Отчество: <input name="lastname" value="'.htmlspecialchars($row['lastname']).'"></p>';
    echo '<p>Пол: <select name="gender">';
    foreach (['мужской', 'женский'] as $g) {
        $selected = ($row['gender'] === $g) ? 'selected' : '';
        echo "<option $selected>$g</option>";
    }
    echo '</select></p>';
    echo '<p>Дата рождения: <input type="date" name="birthdate" value="'.$row['birthdate'].'"></p>';
    echo '<p>Телефон: <input name="phone" value="'.htmlspecialchars($row['phone']).'"></p>';
    echo '<p>Адрес: <input name="address" value="'.htmlspecialchars($row['address']).'"></p>';
    echo '<p>Email: <input name="email" value="'.htmlspecialchars($row['email']).'"></p>';
    echo '<p>Комментарий: <textarea name="comment">'.htmlspecialchars($row['comment']).'</textarea></p>';
    echo '<button type="submit">Сохранить</button>';
    echo '</form>';
}
