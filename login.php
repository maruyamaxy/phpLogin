<?php
session_start();
$mode = $_REQUEST;
$err     ="";
$mes     = array();
// var_dump($mode);
if($mode['mode'] === "login") {
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $err++;
    $mes[] = '入力された値が不正です。';
    // return false;
  }
  //DB内でPOSTされたメールアドレスを検索
  try {
    $pdo = new PDO(DSN, DB_USER, DB_PASS);
    $stmt = $pdo->prepare('select * from User where email = ?');
    $stmt->execute([$_POST['email']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch (\Exception $e) {
    $mes[] = $e->getMessage() . PHP_EOL;
  }
  //emailがDB内に存在しているか確認
  if (!isset($row['email'])) {
    $err++;
    $mes[] = 'メールアドレス又はパスワードが間違っています。';
    // return false;
  }
  //パスワード確認後sessionにメールアドレスを渡す
  if (password_verify($_POST['password'], $row['password'])) {
    session_regenerate_id(true); //session_idを新しく生成し、置き換える
    $_SESSION['EMAIL'] = $row['email'];
    echo 'ログインしました';
  } else {
    $err++;
    $mes[] = 'メールアドレス又はパスワードが間違っています。';
    // return false;
  }
}

include('./temp/login.php');
exit;
?>
