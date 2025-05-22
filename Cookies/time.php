<?php
session_start();

if (!isset($_SESSION['visit_time'])) {
    $_SESSION['visit_time'] = time();
    echo "Вы только что зашли на сайт.";
} else {
    $seconds = time() - $_SESSION['visit_time'];
    echo "Вы зашли на сайт $seconds секунд назад.";
}
?>
