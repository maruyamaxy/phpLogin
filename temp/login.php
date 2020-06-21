<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link href="./css/login.css" rel="stylesheet">
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
  <div class="container">
	  <div class="login-container">
      <div id="output"></div>
      <div class="avatar"></div>
      <div class="form-box">
        <form action="login.php" method="">
          <input type="hidden" name="mode" value="login">
          <input name="email" type="text" placeholder="email">
          <input type="password" placeholder="password">
          <button class="btn btn-info btn-block login" type="submit">Login</button>
        </form>
      </div>
      <div>
        <a href="signUp.php">初めての方はこちら</a>
      </div>
      <?php if($mes) { ?>
        <div class="mes">
          <?php
          foreach($mes as $v){
            echo $v."<br />";
          }
          ?>
        </div>
      <?php } ?>
    </div>
  </div>
   <!-- <h1>ようこそ、ログインしてください。</h1>
   <form  action="login.php" method="post">
     <label for="email">email</label>
     <input type="email" name="email">
     <label for="password">password</label>
     <input type="password" name="password">
     <button type="submit">Sign In!</button>
   </form>
   <h1>初めての方はこちら</h1>
   <form action="signUp.php" method="post">
     <label for="email">email</label>
     <input type="email" name="email">email
     <label for="password">password</label>
     <input type="password" name="password">
     <button type="submit">Sign Up!</button>
     <p>※パスワードは半角英数字をそれぞれ１文字以上含んだ、８文字以上で設定してください。</p>
   </form> -->
</body>
</html>
