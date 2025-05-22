<?php
session_start();
echo isset($_SESSION['message']) ? $_SESSION['message'] : "Нет данных в сессии.";
?>
