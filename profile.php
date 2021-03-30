<?php
session_start();
require_once("database.php");


$link = db_connect();



if (!$_SESSION['user']) {
    header('Location: /index2.php');
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

    <!-- Профиль -->
    <section class="container">
        <div class="akk">

            <form>
                <img src="<?= $_SESSION['user']['avatar'] ?>" width="300" alt="">
              <!--  <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2> -->
              <!--  <a href="#"><?= $_SESSION['user']['email'] ?></a> -->
                <a class="logout" href="vendor/logout.php">Выход</a>
            </form>

            

            <div class="edit_profile">
                <form method="post" class="add_good" action="">
                    <label>ФИО:</label>
                    <input type="text" name="full_name" value="<?= $_SESSION['user']['full_name'] ?>" placeholder="Введите свое полное имя"><br>
                    <label>Логин:</label>
                    <input type="text" name="login" value="<?= $_SESSION['user']['login'] ?>" placeholder="Введите свой логин"><br>
                    <label>Почта:</label>
                    <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>" placeholder="Введите адрес своей почты">
                    <button type="submit" name="profile_sub">Сохранить</button>
                    <?php
                        if (isset($_POST['profile_sub'])) {
                                if ($_POST['full_name'] != '' && $_POST['login'] != '' && $_POST['email'] != '') {
                                    $check_login = mysqli_query($link, "SELECT * FROM users WHERE login = '$_POST['login']'");
                                    if (mysqli_num_rows($check_login) > 0 && $_POST['login'] != $_SESSION['user']['login']) {
                                        echo "<div class='error_profile'><p>Такой логин уже существует!</p></div>";
                                    } else {
                                        $check_email = mysqli_query($link, "SELECT * FROM users WHERE email = '$_POST['email']'");
                                        if (mysqli_num_rows($check_email) > 0 && $_POST['email'] != $_SESSION['user']['email']){
                                            echo "<div class='error_profile'><p>Такая почта уже существует!</p></div>";
                                        } else {
                                            $sql = "UPDATE users SET full_name='%s', login='%s', email='%s' WHERE id='%d'";
                                            $query = sprintf($sql, mysqli_real_escape_string($link, $_POST['full_name']), mysqli_real_escape_string($link, $_POST['login']), 
                                                mysqli_real_escape_string($link, $_POST['email']), $_SESSION['user']['id']);
                                            $result = mysqli_query($link, $query);
                                            if (!$result){
                                                die(mysqli_error($link));    
                                            }

                                            $id = $_SESSION['user']['id'];
                                            $check_user = mysqli_query($link, "SELECT * FROM `users` WHERE `id` = '$id'");
                                            if (mysqli_num_rows($check_user) > 0) {
                                                $user = mysqli_fetch_assoc($check_user);
                                                $_SESSION['user'] = [
                                                    "id" => $user['id'],
                                                    "full_name" => $user['full_name'],
                                                    "avatar" => $user['avatar'],
                                                    "login" => $user['login'],
                                                    "email" => $user['email']
                                                ];
                                            }
                                        }
                                    }
                                } else {
                                    echo "<div class='error_profile'><p>Заполните пустые поля!</p></div>";
                                }
                            }
                    ?>
                </form>
            </div>

            <div class="edit_password">
                <form method="post" class="add_good" action="">
                    <label>Пароль:</label>
                    <input type="password" name="password" placeholder="Введите пароль"><br>
                    <label>Подтверждение пароля:</label>
                    <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
                    <button type="submit" name="password_sub">Сохранить</button>
                 <?php 
                    if (isset($_POST['password_sub'])) {
                        if(strlen($_POST['password']) >= 7 && strlen($_POST['password']) <= 20) {
                            if ($_POST['password']===$_POST['password_confirm']) {
                                $sql = "UPDATE users SET password='%s' WHERE id='%d'";
                                $pass = md5($_POST['password']);
                                $query = sprintf($sql, mysqli_real_escape_string($link, $pass), $_SESSION['user']['id']);
                                $result = mysqli_query($link, $query);
                                if (!$result) {
                                    die(mysqli_error($link));    
                                }
                            }
                            else {
                                echo "<div class='error_profile'><p>Пароли не совпадают!</p></div>";
                            }
                        } 
                        else {
                            echo "<div class='error_profile'><p>Пароль должен состоять от 8 до 20 символов!</p></div>";
                        }
                    }
                    ?>
                </form>
            </div>
            
            <div class="my_program">
                <h1>Мои Программы</h1>
            </div>
            
            
        </div>
   
    </section>

</body>
</html>
