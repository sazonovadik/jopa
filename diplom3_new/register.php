<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link href="css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
</head>
<body>

    <header class="container">
      <section class="menu">
        <nav>
          <ul>
            <li><a href="/index.php">Главная</a></li>
            <li><a href="#">Упражнения</a>
              <ul>
                <li><a href="#">Для ног</a></li>
                <li><a href="#">Для ягодиц</a></li>
                <li><a href="#">Для спины</a></li>
                <li><a href="#">Для груди</a></li>
                <li><a href="#">Для плеч</a></li>
                <li><a href="#">Для бицепса</a></li>
                <li><a href="#">Для трицепса</a></li>
                <li><a href="#">Для предпелечья</a></li>
                <li><a href="#">Для пресса</a></li>
              </ul>
            </li>
            <li><a href="#">Диеты</a></li>
            <li><a href="/programs.php">Программы</a></li>
            <li class="profil"><a href="/index2.php">ПРОФИЛЬ</a></li>
          </ul>
        </nav>
      </section>
    </header>

    <!-- Форма регистрации -->
    <section class="container">
        <div class="akk">
            <form>
                <label>ФИО</label>
                <input type="text" name="full_name" placeholder="Введите свое полное имя">
                <label>Логин</label>
                <input type="text" name="login" placeholder="Введите свой логин">
                <label>Почта</label>
                <input type="email" name="email" placeholder="Введите адрес своей почты">
                <label>Изображение профиля</label>
                <input type="file" name="avatar"> 
                <label>Пароль</label>
                <input type="password" name="password" placeholder="Введите пароль">
                <label>Подтверждение пароля</label>
                <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
                <button type="submit" class="register-btn">Зарегистрироваться</button>
                <p>
                    У вас уже есть аккаунт? - <a href="/index2.php">авторизируйтесь</a>!
                </p>
                <p class="msg none">Lorem ipsum.</p>
            </form>
        </div>    
    </section>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>