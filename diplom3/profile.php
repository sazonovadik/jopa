<?php
session_start();
require_once("database.php");
$link = db_connect();

if (!$_SESSION['user']) {
    header('Location: /index2.php');
}
 
if (isset($_POST['profile_sub'])) {
    $sql = "UPDATE users SET full_name='%s', login='%s', email='%s' WHERE id='%d'";
    $query = sprintf($sql, mysqli_real_escape_string($link, $_POST['full_name']), mysqli_real_escape_string($link, $_POST['login']), mysqli_real_escape_string($link, $_POST['email']), $_SESSION['user']['id']);
    $result = mysqli_query($link, $query);
    if (!$result){
    die(mysqli_error($link));    
    }
}

if (isset($_POST['profile_sub2'])) {
    if ((isset($_POST['password']))==(isset($_POST['password_confirm']))) {
         $sql = "UPDATE users SET = password'%s' WHERE id='%d'";
    $query = sprintf($sql, mysqli_real_escape_string($link, $_POST['password']), $_SESSION['user']['id']);
    $result = mysqli_query($link, $query);
        if (!$result) {
            die(mysqli_error($link));    
        }
    }
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
                    <button type="submit" name="profile_sub">Сохранить</button><br>
                </form>
            </div>

            <div class="edit_password">
                <form method="post" class="add_good" action="">
                    <label>Пароль:</label>
                    <input type="password" name="password" placeholder="Введите пароль"><br>
                    <label>Подтверждение пароля:</label>
                    <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
                    <button type="submit" name="password_sub2">Сохранить</button>
                </form>
            </div>
            
            <div class="my_program">
                <h1>Мои Программы</h1>
            </div>
            
            
        </div>
   
    </section>

</body>
</html>