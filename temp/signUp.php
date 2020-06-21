<!DOCTYPE html>
<html lang="jp">
<head>
    <title>ユーザー登録</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
  <div class="container">
    <header>
     <div class="row">
        <h1>ユーザー登録</h1>
      </div>
    </header>
  </div>
  <hr>
  <div class="container">
    <form action="" method="post" class="row">
      <input type="hidden" name="create" value="create">
      <div class="col-sm-8 col-sm-offset-2">
        <div class="form-group">
          <label for="name"><span class="label label-danger">必須</span> お名前</label>
          <input type="text" id="name" name="name" class="form-control" placeholder="例：ジャングル オーシャン" autofocus required>
        </div>
        <div class="form-group">
          <label for="email"><span class="label label-danger">必須</span> メールアドレス</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="例：raffaello@jungleocean.com" required>
        </div>
        <div class="form-group">
          <label for="password"><span class="label label-danger">必須</span> パスワード</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="123456789" autofocus required>
        </div>
        <!-- <div class="form-group">
          <label for="tel"><span class="label label-danger">必須</span> 電話番号</label>
          <input type="tel" id="tel" name="tel" class="form-control" placeholder="例：080-1234-5678" required>
        </div>
        <div class="form-group">
          <label><span class="label label-danger">必須</span> 性別</label>
          <div>
            <label class="radio-inline">
              <input type="radio" name="male" value="1" required>男性
            </label>
            <label class="radio-inline">
              <input type="radio" name="female" value="2" required>女性
            </label>
          </div>
        </div> -->
        <button type="submit" class="btn btn-primary">送信する</button>
      </div>
    </form>
  </div>
    <hr>
    <div class="container">
        <footer>
            <p>&copy; JungleOcean.</p>
        </footer>
    </div>
</body>
</html>
