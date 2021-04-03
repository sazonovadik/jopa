<?php
  require_once("../database.php");
  require_once("../users/users.php");

  $link = db_connect();

  // Если есть входящий параметр с файла списка статетй, а также с файла с добав. новой статьи
  if(isset($_GET['action']))
    $action = $_GET['action'];
  else
    $action = "";

  if($action == "edit")
  {
    if(!isset($_GET['id']))
    // Переадресация на гравную страницу
    header("Location: index_users.php");
    // Если id - текст, то $id = 0
    $id = (int)$_GET['id'];

    if (!empty($_POST) && $id > 0)
    {
      goods_edit($link, $id, $_POST['full_name'], $_POST['login'], $_POST['email'], $_POST['password']);
      header("Location: index_users.php");
    }

    // Ф-ция articles_get возвращает выбраную строку таблицы - статьи
    $user = goods_get($link, $id);
    // По этому шаблону будет отобр. заранее выбр. строка табл. - статья
    include("../views/users_admin_edit.php");
  }
  else if($action == "delete")
  {
    $id = $_GET['id'];
    $user = goods_delete($link, $id);
    header("Location: index_users.php");
  }

    else {
    // Иначе отображаем список всех статей в админ. панели
      $users = goods_all($link);
      include("../views/users_admin.php");
  }
?>
