<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма обратной связи</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <img src="../img/logo.png" alt="Логотип МосПолитеха">
            <h1>Feedback Form</h1>
        </header>
        <main class="main">
            <section class="form-section">
                <h2>Оставьте ваш отзыв</h2>
                <form action="https://httpbin.org/post" method="POST">
                    <label>
                        Имя:
                        <input type="text" name="name" required>
                    </label>

                    <label>
                        Email:
                        <input type="email" name="email" required>
                    </label>

                    <fieldset>
                        <legend>Тип обращения:</legend>
                        <label><input type="radio" name="type" value="complaint" required> Жалоба</label>
                        <label><input type="radio" name="type" value="suggestion"> Предложение</label>
                        <label><input type="radio" name="type" value="gratitude"> Благодарность</label>
                    </fieldset>

                    <label>
                        Текст обращения:
                        <textarea name="message" rows="5" required></textarea>
                    </label>

                    <fieldset>
                        <legend>Вариант ответа:</legend>
                        <label><input type="checkbox" name="response[]" value="sms"> СМС</label>
                        <label><input type="checkbox" name="response[]" value="email"> Email</label>
                    </fieldset>

                    <button type="submit">Отправить</button>
                </form>

                <a href="response.php" class="link-button">Перейти на 2 страницу</a>
            </section>
        </main>

        <footer class="footer">
            <p>Задание для самостоятельной работы.</p>
        </footer>
    </div>
</body>
</html>
