<?php
session_start();

if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
    echo "Вы еще не обновляли страницу.";
} else {
    $_SESSION['counter']++;
    echo "Вы обновили страницу {$_SESSION['counter']} раз(а).";
}
?>
