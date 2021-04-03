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
      <div class="Text_AdminPanel"><a>Панель Администратора</a></div>

      <div class="Text_Section">
        <nav>
          <ul>
            <li><a href="../admin/index.php">ПРОГРАММЫ</a></li>
            <li><a href="../admin/index_users.php">ПОЛЬЗОВАТЕЛИ</a></li>
            <li><a href="../admin/index_payment.php">ОПЛАТА</a></li>
          </ul>
        </nav>
      </div>
    </section>

    <section class="container">
        <table class="admin-table">
          <tr>
            <th>ФИО</th>
            <th>Логин</th>
            <th>Email</th>
            <th>Пароль</th>
            <th></th>
            <th></th>
          </tr>
          <?php foreach($users as $a): ?>
            <tr>
              <td><?=$a['full_name']?></td>
              <td><?=$a['login']?></td>
              <td><?=$a['email']?></td>
              <td><?=$a['password']?></td>
              <td><a href="index_users.php?action=edit&id=<?=$a['id']?>">Редактировать</a></td>
              <td><a href="index_users.php?action=delete&id=<?=$a['id']?>">Удалить</a></td>
            </tr>
          <?php endforeach ?>
        </table>
    </section>

  </body>
</html>
