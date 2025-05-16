<?php
function showContacts($sort = 'added', $page = 1) {
    $pdo = getPDO();
    $limit = 10;
    $offset = ($page - 1) * $limit;

    // Определяем, по какому полю будет сортировка
    $orderBy = match($sort) {
        'surname' => 'surname',
        'birthdate' => 'birthdate',
        'added' => 'created_at',
        default => 'created_at'
    };

    // Получаем список пользователей с пагинацией
    $stmt = $pdo->prepare("SELECT * FROM contacts ORDER BY $orderBy LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Выводим таблицу с данными пользователей
    echo "<table border='1'>";
    echo "<tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Пол</th>
            <th>Дата рождения</th>
            <th>Телефон</th>
            <th>Адрес</th>
            <th>Email</th>
            <th>Комментарий</th>
            <th>Дата добавления</th>
        </tr>";

    // Печатаем данные о каждом пользователе
    foreach ($rows as $row) {
        echo "<tr>
                <td>{$row['surname']}</td>
                <td>{$row['name']}</td>
                <td>{$row['lastname']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['birthdate']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['address']}</td>
                <td>{$row['email']}</td>
                <td>{$row['comment']}</td>
                <td>{$row['created_at']}</td>
            </tr>";
    }
    echo "</table>";

    // Пагинация
    $total = $pdo->query("SELECT COUNT(*) FROM contacts")->fetchColumn();
    $pages = ceil($total / $limit);
    echo "<div>";
    for ($i = 1; $i <= $pages; $i++) {
        echo "<a href='?action=view&sort=$sort&page=$i' style='margin:5px;'>$i</a>";
    }
    echo "</div>";
}
