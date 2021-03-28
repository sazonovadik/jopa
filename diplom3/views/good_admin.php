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
      <div class="">
        <form method="post" class="add_good" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>" enctype="multipart/form-data">
          <label>
            Название
            <br>
            <input type="text" name="title" value="<?=$good['title']?>" class="form-item" autofocus required>
          </label>
          <label>
            <br>
            Описание
            <br>
            <textarea type="text" name="content" class="form-item" autofocus required><?=$good['content']?></textarea>
          </label>
          <label>
            <br>
            Цена
            <br>
            <input type="text" name="price" value="<?=$good['price']?>" class="form-item" autofocus required>
          </label>
                
          <label>
            <br>
            Изображение
            <br>
            <br>
            <input type="file" name="logo" value="<?=$good['logo']?>" class="" autofocus required>
          </label>
            <br>

          <label>
            <br>
            Дата
            <br>
            <input type="date" name="date" value="<?=$good['date']?>" class="form-item" autofocus required>
            <br>
            <br>
            <input type="submit" value="Сохранить" class="btn">
          </label>
        </form>
      </div>
    </section>

  </body>
</html>
