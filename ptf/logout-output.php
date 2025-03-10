<?php
session_start();
require 'header.php';

if(isset($_SESSION['customer'])){
    unset($_SESSION['customer']);
    ?>
    <p>ログアウトしました。</p>
    <?php
}else{
    ?>
    <p>すでにログアウトしました。</p>
    <?php
}

?>
<a href="product.php">TOP</a>