<?php
function goods_all($link){
  $query = "SELECT * FROM goods ORDER BY id DESC";
  $result = mysqli_query($link, $query);
  if (!$result) {
    die(mysqli_error($link));
  }
  $n = mysqli_num_rows($result);
  $goods = array();

  for ($i = 0; $i < $n; $i++) {
    $row = mysqli_fetch_assoc($result);
	$goods[] = $row;
  }
return $goods;
}

function goods_get($link, $id_good) {
  $query = sprintf("SELECT * FROM goods WHERE id=%d", (int)$id_good);
  $result = mysqli_query($link, $query);
  if (!$result)
    die (mysqli_error($link));
  $good = mysqli_fetch_assoc($result);
  return $good;
}

function goods_new($link, $title, $content, $price, $date, $logo){
  $title = trim($title);
  $content = trim($content);
  $price = trim($price);
  if ($title == '')
    return false;

  $path = '/img/' . time() . $_FILES['logo']['name'];
  move_uploaded_file($_FILES['logo']['tmp_name'], '../' . $path);

  $t = "INSERT INTO goods (title, content, price, date, logo) VALUES ('%s', '%s', '%s', '%s', '%s')";
  $query = sprintf($t, mysqli_real_escape_string($link, $title),
   mysqli_real_escape_string($link, $content), mysqli_real_escape_string($link, $price),
    mysqli_real_escape_string($link, $date), mysqli_real_escape_string($link, $path));
  $result = mysqli_query($link, $query);
  if (!$result) {
    die(mysqli_error($link));
  }
  return true;
}

function goods_edit($link, $id, $title, $content, $price, $date, $logo){
  $title = trim($title);
  $content = trim($content);
  $price = trim($price);
  $date = trim($date);
  $id = (int)$id;
  $logo = trim($logo);
  if ($title == '')
    return false;

  $path = '/img/' . time() . $_FILES['logo']['name'];
  move_uploaded_file($_FILES['logo']['tmp_name'], '../' . $path);
  
  $sql = "UPDATE goods SET title='%s', content='%s', price='%s', date='%s', logo='%s' WHERE id='%d'";
  $query = sprintf($sql, mysqli_real_escape_string($link, $title), mysqli_real_escape_string($link, $content), mysqli_real_escape_string($link, $price),
  mysqli_real_escape_string($link, $date), mysqli_real_escape_string($link, $path), $id);

  $result = mysqli_query($link, $query);
  if (!$result)
    die(mysqli_error($link));
  return mysqli_affected_rows($link);
}

function goods_delete($link, $id){
  $id = (int)$id;
  if ($id == 0)
    return false;
  $query = sprintf("DELETE FROM goods WHERE id='%d'", $id);
  $result = mysqli_query($link, $query);
  return mysqli_affected_rows($link);
}

function goods_intro($text, $len=500) {
  return mb_substr($text, 0, $len);
}
?>
