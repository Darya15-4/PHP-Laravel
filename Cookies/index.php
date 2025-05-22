<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $_SESSION['country'] = $_POST['country'];
    echo "Страна записана в сессию. <a href='test.php'>Перейти на test.php</a>";
} else {
?>
<form method="post" action="">
    Введите вашу страну: <input type="text" name="country" required>
    <input type="submit" value="Отправить">
</form>
<?php
}
?>
