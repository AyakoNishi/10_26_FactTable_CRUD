<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>カフェ売り上げ実績ログイン画面</title>
</head>

<body>
  <form action="../login/fact_login_act.php" method="POST">
    <fieldset>
      <legend>カフェ売り上げ実績ログイン画面</legend>
      <div>
        username: <input type="text" name="username">
      </div>
      <div>
        password: <input type="text" name="password">
      </div>
      <div>
        <button>Login</button>
      </div>
      <button><a href="../login/fact_register.php">新規登録</a></button>
    </fieldset>
  </form>

</body>

</html>