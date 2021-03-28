<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>БЛОГ О СПОРТЕ</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
  </head>

  <body>
    <header class="container">
      <div class="menu">
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
      </div>
    </header>

    <section class="container">
      <div class="article">
      <h3><?=$good['title']?></h3>
     <!-- <img src="<?=$good['logo']?>"> -->
      <p><?=$good['content']?></p>
      <em>Опубликовано: <?=$good['date']?></em>
    </div>
    </section>
  </body>

</html>
