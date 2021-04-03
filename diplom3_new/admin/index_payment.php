<?php
  require_once("../database.php");
  require_once("../payment/payment.php");

  $link = db_connect();

  // Если есть входящий параметр с файла списка статетй, а также с файла с добав. новой статьи
  if(isset($_GET['action']))
    $action = $_GET['action'];
  else
    $action = "";

  if($action == "add") {
    // Будет работать уже с меню добав. новой статьи
  // Если заполнен. форма в меню добав. новой статьи не пустая, тоесть заполненая и отправленная методом POST
  if(!empty($_POST)) {
    // Значит передаем значения глобал. моссива $_POST с соответствующими индексами в ф-цию созд. новой статьи
    goods_new($link, $_POST['id_user'], $_POST['id_program'], $_POST['file']);

    // Ф-ция отправки HTTP-заголовка
    header("Location: index_payment.php");
  }

  // Меню-форма добавления новой статьи
    include("../views/payment_admin_new.php");
  }
  else if($action == "edit")
  {
    if(!isset($_GET['id']))
    // Переадресация на гравную страницу
    header("Location: index_payment.php");
    // Если id - текст, то $id = 0
    $id = (int)$_GET['id'];

    if (!empty($_POST) && $id > 0)
    {
      goods_edit($link, $id, $_POST['id_user'], $_POST['id_program'], $_POST['file']);
      header("Location: index_payment.php");
    }

    // Ф-ция articles_get возвращает выбраную строку таблицы - статьи
    $pay = goods_get($link, $id);
    // По этому шаблону будет отобр. заранее выбр. строка табл. - статья
    include("../views/payment_admin_new.php");
  }
  else if($action == "delete")
  {
    $id = $_GET['id'];
    $pay = goods_delete($link, $id);
    header("Location: index_payment.php");
  }

    else {
    // Иначе отображаем список всех статей в админ. панели
      $pays = goods_all($link);
      include("../views/payment_admin.php");
  }
?>