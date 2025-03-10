<?php

session_start();
require 'header.php';

// セッションを削除、周回ごとに消す
unset($_SESSION['customer']);

$pdo = new PDO(
    'mysql:host=localhost;dbname=free;charset=utf8',
    'staff',
    'password'
);

// 送られたユーザー名とパスワードに一致するデータを取得
$login = $_REQUEST['login'];
$password = $_REQUEST['password'];
$query = 'SELECT * FROM customer
            WHERE login = ?
            AND password = ?';

$sql = $pdo->prepare($query);
$sql->execute([$login,$password]);

foreach($sql as $row){
    $_SESSION['customer'] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'address' => $row['address'],
        'login' => $row['login'],
        'password' => $row['password']
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="log2.css">
</head>
<body>
<div class="login-output">
    <img src="image/log3.jpg" alt="PCひつじ">
<?php
if(isset($_SESSION['customer'])){
    ?>
        <p>ようこそ、
        <?= $_SESSION['customer']['name']?>さん。</p>
        <div class="aa">
            <p><a href="buy.php">購入手続きへ</a></p>
        </div>
        <div class="aa">
            <p>
                <a href="product.php">TOPへ</a>
            </p>
        </div>
    <?php
}else{
    ?>
    <p>ログイン名またはパスワード名が違います。</p>
    <div class="aa">
        <p><a href="product.php">TOPへ</a></p>
    </div>
    <?php
}
?>
</div>
</body>
</html>
