<?php
session_start();
$_SESSION['message'] = "Привет с первой страницы!";
echo "Данные записаны в сессию. <a href='read.php'>Перейти на вторую страницу</a>";
?>
