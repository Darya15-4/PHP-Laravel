<?php
function showAddForm() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = getPDO();
        $stmt = $pdo->prepare("INSERT INTO contacts (surname, name, lastname, gender, birthdate, phone, address, email, comment) 
            VALUES (:surname, :name, :lastname, :gender, :birthdate, :phone, :address, :email, :comment)");
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
        ]);
        echo $ok ? "<p style='color:green;'>Запись добавлена</p>" : "<p style='color:red;'>Ошибка: запись не добавлена</p>";
    }

    echo '<form method="post">';
    echo '<p>Фамилия: <input name="surname"></p>';
    echo '<p>Имя: <input name="name"></p>';
    echo '<p>Отчество: <input name="lastname"></p>';
    echo '<p>Пол: <select name="gender"><option>мужской</option><option>женский</option></select></p>';
    echo '<p>Дата рождения: <input type="date" name="birthdate"></p>';
    echo '<p>Телефон: <input name="phone"></p>';
    echo '<p>Адрес: <input name="address"></p>';
    echo '<p>Email: <input name="email"></p>';
    echo '<p>Комментарий: <textarea name="comment"></textarea></p>';
    echo '<button type="submit">Добавить</button>';
    echo '</form>';
}
