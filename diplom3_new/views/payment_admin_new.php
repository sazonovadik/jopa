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
      <div class="Text_EditUser"><h1>Редактирование покупки</h1></div>
        <div class="button_add"><a href="/admin/index_payment.php">Вернуться назад</a></div>
        
    </section>

    <section class="container">
      <div class="form_edit">
        <form method="post" class="add_good" action="index_payment.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
          <label>ID Пользователя: <br><input type="text" name="id_user" value="<?=$pay['id_user']?>" class="form-item" autofocus required></label><br>
          <label>ID Программы: <br><input type="text" name="id_program" value="<?=$pay['id_program']?>" class="form-item" autofocus required></label><br>
          <label>Имя Файла: <br><input type="text" name="file" value="<?=$pay['file']?>" class="form-item" autofocus required></label><br>
          <div class="save"><input type="submit" value="Сохранить" class="btn"></div>
        </form>
      </div>
    </section>

  </body>
</html>
