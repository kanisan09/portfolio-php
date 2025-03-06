<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カートの中身</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>

<?php
session_start();
require 'header.php';

$id = $_REQUEST['id'];
if(!isset($_SESSION['product'])){
    $_SESSION['product'] = [];
}

$count = 1;
if(isset($_SESSION['product'][$id])){
    $count = $_SESSION['product'][$id];
}

$_SESSION['product'][$id]=[
    'name' => $_REQUEST['name'],
    'price' => $_REQUEST['price'],
    'count' => $count
];
?>

<p>カートに追加しました</p>

<?php require 'cart.php'; ?>

<p><a href="product.php">商品一覧へ</a></p>

</body>
</html>