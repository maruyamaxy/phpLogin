<?php
require_once "db.php";
// 初期値は保存をかけないので決め打ち
$mode = 'form';

$mode = $_REQUEST['mode'];
if($mode === 'add') {
  try {
    // formからのrequestで各変数に格納
    $name = $_REQUEST['name'];
    $furi = $_REQUEST['furi'];
    $address = $_REQUEST['address'];
    $comment = $_REQUEST['comment'];
    // データベースの接続 第四引数にエラーが出るように配列で渡す
    $db = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES => false,));
    // 空のINSERTを作成
    $sql = "INSERT INTO user (name, furi, address, comment) VALUES (:name, :furi, :address, :comment)";
    $stmt = $db->prepare($sql);
    // 上記で作成した物に値を挿入する
    $params = array(':name' => $name, ':furi' => $furi, ':address' => $address, ':comment' => $comment);
    // 保存をする
    $stmt->execute($params);

    include './temp/index.php';
    exit();
  } catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
  }
} else {
  include './forms.php';
  exit();
}

?>
