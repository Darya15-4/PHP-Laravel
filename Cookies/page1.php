<?php
session_start();

if (!isset($_SESSION['text'])) {
    $_SESSION['text'] = 'test';
    echo "Текст 'test' записан в сессию. Обновите страницу.";
} else {
    echo "Содержимое сессии: " . $_SESSION['text'];
}
?>
