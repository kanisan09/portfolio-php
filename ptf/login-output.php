<?php

session_start();
require 'header.php';

unset($_SESSION['customer']);

$pdo = new PDO(
    'mysql:host=localhost;dbname=shop;charset=utf8',
    'staff',
    'password'
);

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

if(isset($_SESSION['customer'])){
    echo 'ようこそ、',
    $_SESSION['customer']['name'],'さん。';
}else{
    echo 'ログイン名またはパスワード名が違います。';
}
?>