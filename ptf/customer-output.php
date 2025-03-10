<?php
session_start();
require 'header.php';

$pdo = new PDO(
    'mysql:host=localhost;dbname=free;charset=utf8',
    'staff',
    'password'
);

// 入力されたログイン名が存在しているか調べる
$query = 'SELECT * FROM customer WHERE login = ?';
$sql = $pdo->prepare($query);
$sql->execute([
    $_REQUEST['login']
]);
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

<div class="output">
<img src="image/log2.jpg" alt="PCたぬき">
    <?php
    if(empty($sql->fetchAll())){
        // ↑登録処理　↓ログイン状態で処理を分岐
        if(isset($_SESSION['customer'])){
            // DB更新
            $query = 'UPDATE customer SET
                        name =?, address =?, login =?, password = ? WHERE id =?';
    
            // SQL実行
            $sql = $pdo->prepare($query);
            $sql->execute([
                $_REQUEST['name'],
                $_REQUEST['address'],
                $_REQUEST['login'],
                $_REQUEST['password'],
                $_SESSION['customer']['id']
            ]);
            ?>
    
            <div class="clear">
                <p>ログイン情報を更新しました。</p>
                <div class="cus-btn"><a href="product.php">TOPへ</a></div>
            </div>
            <?php
        }else{
            // 未ログイン
            $query = 'INSERT INTO customer VALUES(NULL,?, ?, ?, ?)';
    
            $sql = $pdo->prepare($query);
            $sql->execute([
                $_REQUEST['name'],
                $_REQUEST['address'],
                $_REQUEST['login'],
                $_REQUEST['password']
            ]);
            ?>
            <div class="ok">
                <p>ログイン情報を登録しました。</p>
                <div class="cus-btn"><a href="product.php">TOPへ</a></div>
            </div>
            <?php
        }
    }else{
        ?>
        <div class="no">
            <p>ログイン名がすでに使われています。変更してください。</p>
            <div class="cus-btn"><a href="customer-input.php">会員登録に戻る</a></div>
        </div>
        <?php
    }
    ?>
</div>
</body>
</html>