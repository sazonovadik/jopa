<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>БЛОГ О СПОРТЕ</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
  </head>
  <header>
      
    </header>

  <body>
    <div class="container">
    <div>
      <?php foreach($goods as $a): ?>
        <div class="article">
        <h3>
        <a href=""><?=$a['title']?></a>
        </h3>
        <img src="<?=$a['logo']?>">
       <!-- <em>Опубликовано: <?=$a['date']?></em> -->
       <!-- <p><?=goods_intro($a['content'])?></p> -->
        </div>
        <div class="price"><a><?=$a['price']?> Рублей</a></div>
        <div class="podrobnee"><a href="good.php?id=<?=$a['id']?>">Подробнее</a></div>
      
      <?php endforeach ?>
    </div>
  </body>

</html>
