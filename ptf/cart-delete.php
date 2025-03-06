<?php
session_start();
require 'header.php';

unset($_SESSION['product'][$_REQUEST['id']]);
echo 'カートから商品を削除しました。<br>';
?>
<p><a href="cart.php">カートに戻る</a></p>
<p><a href="product.php">商品一覧へ</a></p>

<?php
require 'cart.php';

?>


