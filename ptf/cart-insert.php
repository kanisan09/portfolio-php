<?php
session_start();
require 'header.php';

$id = $_REQUEST['id'];
if(!isset($_SESSION['product'])){
    $_SESSION['product'] = [];
}

$count = 0;
if(isset($_SESSION['product'][$id])){
    $count = $_SESSION['product'][$id]['count'];
}

$_SESSION['product'][$id]=[
    'name' => $_REQUEST['name'],
    'price' => $_REQUEST['price'],
    'count' => $count + $_REQUEST['count']
];
?>

<p>カートに追加しました</p>
<hr>
