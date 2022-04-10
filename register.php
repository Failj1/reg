<?php

    session_start();
?>

<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <!-- Форма регистрации -->


    
<!-- Проверка на авторизацию -->







    <form action="act/signup.php" method="post" enctype="multipart/form-data">
        <label>ФИО</label>
        <input type="text" name="full_name" placeholder="Введите свое полное имя">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Изображение профиля</label>
        <input type="file" name="avatar">
        <label>Пароль</label>
        <input type="password" maxlength="8" name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input type="password" minlength="8" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit">Регистрация</button>
        <br>
        <a href="index.php">Выйти</a>
        


        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
</body>
</html>