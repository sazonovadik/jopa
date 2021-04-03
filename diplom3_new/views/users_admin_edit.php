<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>БЛОГ О СПОРТЕ</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css_admin/css_admin.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
  </head>

  <body>

    <section class="container">
      <div class="Text_EditUser"><h1>Редактирование пользователя</h1></div>
      <div class="button_add"><a href="/admin/index_users.php">Вернуться назад</a></div>
    </section>

    <section class="container">
      <div class="form_edit">
        <form method="post" class="add_good" action="index_users.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
          <label>ФИО: <br><input type="text" name="full_name" value="<?=$user['full_name']?>" class="form-item" autofocus required></label><br>
          <label>Логин: <br><input type="text" name="login" value="<?=$user['login']?>" class="form-item" autofocus required></label><br>
          <label>Email: <br><input type="text" name="email" value="<?=$user['email']?>" class="form-item" autofocus required></label><br>
          <label>Пароль: <br><input type="text" name="password" value="<?=$user['password']?>" class="form-item" autofocus required></label><br>
          <input class="button_edit" type="submit" value="Сохранить" class="btn">
        </form>
      </div>
    </section>

  </body>
</html>
