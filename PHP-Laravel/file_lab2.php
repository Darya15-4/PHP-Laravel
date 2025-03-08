<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Динамический контент на PHP</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>


<?php
$greetings = ["Привет, мир!", "Здравствуй, мир!", "Да здравствует мир!"];
$randomGreeting = $greetings[array_rand($greetings)];
?>


<header>
    <img src="img/mpu.jfif" alt="Логотип" class="logo">
    <h1>Лабораторная работа</h1>
</header>

<main>
    <p><?php echo $randomGreeting; ?></p>
    <button onclick="reloadPage()">Обновить текст</button>
</main>

<footer>
    <p>Задание для самостоятельной работы</p>
</footer>


<script>
function reloadPage() {
    location.reload();
}
</script>


</body>
</html>
