<?php
session_start();

if (isset($_SESSION['country'])) {
    echo "Ваша страна: " . htmlspecialchars($_SESSION['country']);
} else {
    echo "Страна не задана.";
}
?>
