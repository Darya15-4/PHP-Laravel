<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результат get_headers</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <img src="images/mospolytech_logo.png" alt="Логотип МосПолитеха">
            <h1>Заголовки страницы</h1>
        </header>

        <main class="main">
            <section class="headers-section">
                <h2>Вывод заголовков</h2>
                <textarea readonly><?php 
                    $headers = get_headers("https://httpbin.org/post");
                    foreach ($headers as $header) {
                        echo $header . "\n";
                    }
                ?></textarea>
            </section>
            <a href="index.php" class="link-button">Назад к форме</a>
        </main>

        <footer class="footer">
            <p>Задание для самостоятельной работы.</p>
        </footer>
    </div>
</body>
</html>
