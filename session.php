<?php
function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

session_start();
//ログイン済みの場合
if (isset($_SESSION['EMAIL'])) {
  echo 'ようこそ' .  h($_SESSION['EMAIL']) . "さん<br>";
  echo "<a href='/logout.php'>ログアウトはこちら。</a>";
  exit;
} else {
	if(strpos($_SERVER["REQUEST_URI"],'organizer') !== false){
		header("location: /tournaments/group/login.php");
		exit;
	}else {
		header("location: login.php?reffer=".$_SERVER["REQUEST_URI"]);
		exit;
	}
}
?>
