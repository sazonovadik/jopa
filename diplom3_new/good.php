<?php
  require_once("database.php");
  require_once("goods/goods.php");

  $link = db_connect();
  $good = goods_get($link, $_GET['id']);

  include("views/good.php");
?>
