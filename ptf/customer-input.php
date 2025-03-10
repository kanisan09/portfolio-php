<?php
session_start();
require 'header.php';

$name = '';
$address = '';
$login = '';
$password = '';
if(isset($_SESSION['customer'])){
    $name = $_SESSION['customer']['name'];
    $address = $_SESSION['customer']['address'];
    $login = $_SESSION['customer']['login'];
    $password = $_SESSION['customer']['password'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
    <link rel="stylesheet" href="customer.css">
</head>
<body>
<div class="log-form">
<h1>会員登録</h1>
    <div class="log">
        <form action="customer-output.php" method = "post">
            <label>お名前</label>
            <p><input type="text" name = "name" value = "<?= $name ?>"></p>
            <label>メールアドレス</label>
            <p><input type="text" name = "address" value="<?= $address ?>"></p>
            <label>ログイン名</label>
            <p><input type="text" name = "login" value="<?= $login ?>"></p>
            <label>パスワード</label>
            <p><input type="text" name = "password" value="<?= $password ?>"></p>
            <p><input type="submit" value = "確定"></p>
        </form>
    </div>
</div>
</body>
</html>