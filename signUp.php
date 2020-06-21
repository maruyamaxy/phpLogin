<?php
require_once "db.php";
$mode = $_REQUEST;
$err     ="";
$mes     = array();
ini_set('display_errors', "On");
// require_once "session.php";
// require_once('config.php');

if($mode['create'] === 'create') {
  // formからのrequestで各変数に格納
  $name = $_REQUEST['name'];
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];
  //データベースへ接続、テーブルがない場合は作成
  try {
    $db = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false));
  } catch (Exception $e) {
    $err++;
    $mes[] = $e->getMessage() . PHP_EOL;
  }
  //POSTのValidate。
  if (!$email = filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
    $err++;
    $mes[] = '入力された値が不正です。';
    return false;
  }
  //パスワードの正規表現
  if (preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i', $_REQUEST['password'])) {
    $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
  } else {
    $err++;
    $mes[] = 'パスワードは半角英数字をそれぞれ1文字以上含んだ8文字以上で設定してください。';
  }
  var_dump(111122333211);
  // exit;

  //登録処理
  try {
    var_dump(444);
    ini_set('display_errors', "On");
    $db = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false));
    var_dump($db);
    exit;
    $sql = "INSERT INTO user (name, email, password) VALUES (:name, :email, :password)";
    var_dump(666);
    $stmt = $db->prepare($sql);
    ini_set('display_errors', "On");
    // 上記で作成した物に値を挿入する
    $params = array(':name' => $name, ':email' => $email, ':password' => $password);
    var_dump($params);
    exit;
    // 保存をする
    $stmt->execute($params);
    var_dump(111111);
    exit;
    echo '登録完了';
  } catch (\Exception $e) {
    $err++;
    $mes[] = '登録済みのメールアドレスです。';
  }
}
var_dump(1112222111);
exit;

include('./temp/signUp.php');
exit;
?>
