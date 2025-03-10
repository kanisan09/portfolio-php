<?php require 'header.php'; ?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="log.css">
</head>
<body>
    <div class="login-group">
        <h1>ログイン</h1>
        <div class="login">
        <form action="login-output.php" method='post'>
            <label for="username">ユーザー名</label>
            <input type="text" name="login">
            </div><br>
            <div class="login">
                <label for="password">パスワード</label>
                <input type="text" name="password"><br>
            </div>
            <input type="submit" value="ログイン">
        </form>
        </div>
    </div>
    <div class="logout-btn"><a href="logout-input.php">ログアウト</a></div>
</body>
</html>
