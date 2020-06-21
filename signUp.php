<?php
require_once "db.php";
$mode = $_REQUEST;
$err     ="";
$mes     = array();
ini_set('display_errors', "On");
// require_once "session.php";
// require_once('config.php');

if($mode['create'] === 'create') {
  //データベースへ接続、テーブルがない場合は作成
  try {
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false,));
    $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dsn->exec("create table if not exists userDeta(
        id int not null auto_increment primary key,
        email varchar(255),
        password varchar(255),
        created timestamp not null default current_timestamp
      )");
  } catch (Exception $e) {
    $err++;
    $mes[] = $e->getMessage() . PHP_EOL;
  }
  //POSTのValidate。
  if (!$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $err++;
    $mes[] = '入力された値が不正です。';
    return false;
  }
  //パスワードの正規表現
  if (preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i', $_POST['password'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  } else {
    $err++;
    $mes[] = 'パスワードは半角英数字をそれぞれ1文字以上含んだ8文字以上で設定してください。';
    return false;
  }
  //登録処理
  try {
    $stmt = $dsn->prepare("insert into userDeta(email, password) value(?, ?)");
    $stmt->execute([$email, $password]);
    echo '登録完了';
  } catch (\Exception $e) {
    $err++;
    $mes[] = '登録済みのメールアドレスです。';
  }
}

include('./temp/signUp.php');
exit;
?>
