<?php
function goods_all($link){
  $query = "SELECT * FROM payment ORDER BY id DESC";
  $result = mysqli_query($link, $query);
  if (!$result) {
    die(mysqli_error($link));
  }
  $n = mysqli_num_rows($result);
  $payments = array();

  for ($i = 0; $i < $n; $i++) {
    $row = mysqli_fetch_assoc($result);
	$payments[] = $row;
  }
return $payments;
}

function goods_get($link, $id_payment) {
  $query = sprintf("SELECT * FROM payment WHERE id=%d", (int)$id_payment);
  $result = mysqli_query($link, $query);
  if (!$result)
    die (mysqli_error($link));
  $payment = mysqli_fetch_assoc($result);
  return $payment;
}

function goods_new($link, $id_user, $id_program, $file){
  $id_user = trim($id_user);
  $id_program = trim($id_program);
  $file = trim($file);
  if ($id_user == '')
    return false;

  $t = "INSERT INTO payment (id_user, id_program, file) VALUES ('%s', '%s', '%s')";
  $query = sprintf($t, mysqli_real_escape_string($link, $id_user),
   mysqli_real_escape_string($link, $id_program), mysqli_real_escape_string($link, $file));
  $result = mysqli_query($link, $query);
  if (!$result) {
    die(mysqli_error($link));
  }
  return true;
}

function goods_edit($link, $id, $id_user, $id_program, $file){
  $id_user = trim($id_user);
  $id_program = trim($id_program);
  $file = trim($file);
  $id = (int)$id;

  $sql = "UPDATE payment SET id_user='%s', id_program='%s', file='%s' WHERE id='%d'";
  $query = sprintf($sql, mysqli_real_escape_string($link, $id_user), mysqli_real_escape_string($link, $id_program), mysqli_real_escape_string($link, $file), $id);

  $result = mysqli_query($link, $query);
  if (!$result)
    die(mysqli_error($link));
  return mysqli_affected_rows($link);
}

function goods_delete($link, $id){
  $id = (int)$id;
  if ($id == 0)
    return false;
  $query = sprintf("DELETE FROM payment WHERE id='%d'", $id);
  $result = mysqli_query($link, $query);
  return mysqli_affected_rows($link);
}

function goods_intro($text, $len=500) {
  return mb_substr($text, 0, $len);
}
?>
