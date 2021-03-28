<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>БЛОГ О СПОРТЕ</title>
    <link href="../css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
  </head>

  <body>

    <section class="container">
    <div class="panel_admin"><a>Панель Администратора</a></div>

    <div class="razdel_admin">
      <nav>
        <ul>
          <li><a href="#">ПРОГРАММЫ</a></li>
          <li><a href="#">ПОЛЬЗОВАТЕЛИ</a></li>
        </ul>
      </nav>
    </div>

    </section>



    <section class="container">
      <div class="dobavit"> <a href = "index.php?action=add">Добавить Программу</a></div>
        <table border="1" class="admin-table">
          <tr>
            <th>Дата</th>
            <th>Заголовок</th>
            <th>Содержание</th>
            <th>Цена</th>
            <th>Изображение</th>
          </tr>
          <?php foreach($goods as $a): ?>
            <tr>
              <td><?=$a['date']?></td>
              <td><?=$a['title']?></td>
              <td><?=$a['content']?></td>
              <td><?=$a['price']?></td>
              <td><?=$a['logo']?></td>
              <td><a href="index.php?action=edit&id=<?=$a['id']?>">Редактировать</a></td>
              <td><a href="index.php?action=delete&id=<?=$a['id']?>">Удалить</a></td>
            </tr>
          <?php endforeach ?>
        </table>
      </div>
    </section>

  </body>
</html>
