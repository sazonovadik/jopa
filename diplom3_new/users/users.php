<?php
function goods_all($link){
  $query = "SELECT * FROM users ORDER BY id DESC";
  $result = mysqli_query($link, $query);
  if (!$result) {
    die(mysqli_error($link));
  }
  $n = mysqli_num_rows($result);
  $users = array();

  for ($i = 0; $i < $n; $i++) {
    $row = mysqli_fetch_assoc($result);
	$users[] = $row;
  }
return $users;
}

function goods_get($link, $id_user) {
  $query = sprintf("SELECT * FROM users WHERE id=%d", (int)$id_user);
  $result = mysqli_query($link, $query);
  if (!$result)
    die (mysqli_error($link));
  $user = mysqli_fetch_assoc($result);
  return $user;
}

function goods_edit($link, $id, $full_name, $login, $email, $password){
  $full_name = trim($full_name);
  $login = trim($login);
  $email = trim($email);
  $password = trim($password);
  $id = (int)$id;


  $sql = "UPDATE users SET full_name='%s', login='%s', email='%s', password='%s' WHERE id='%d'";
  $query = sprintf($sql, mysqli_real_escape_string($link, $full_name), mysqli_real_escape_string($link, $login), mysqli_real_escape_string($link, $email),
  mysqli_real_escape_string($link, $password), $id);

  $result = mysqli_query($link, $query);
  if (!$result)
    die(mysqli_error($link));
  return mysqli_affected_rows($link);
}

function goods_delete($link, $id){
  $id = (int)$id;
  if ($id == 0)
    return false;
  $query = sprintf("DELETE FROM users WHERE id='%d'", $id);
  $result = mysqli_query($link, $query);
  return mysqli_affected_rows($link);
}

function goods_intro($text, $len=500) {
  return mb_substr($text, 0, $len);
}
?>
