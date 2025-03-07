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
if(!empty($_SESSION['product'])){

$total = 0;
$taxRate = 0.1; //消費税10％
foreach($_SESSION['product'] as $id=>$product){
    $subtotal = $product['price'] * (1 + $taxRate);
    $total += $subtotal;
}
?>

<tr>
    <td colspan="4">合計</td>
    <td><?= $total ?>円</td>
</tr>

<button>お支払いに進む</button>
<hr>

<?php
foreach($_SESSION['product'] as $id => $product):
?>


    <p><img src="image/1.<?= $id ?>.jpg" alt="product" width="200"></p>
    <p>商品ID：000<?= $id ?></p>
    <p>商品名：<?= $product['name']?></p>
    <p>値段：<?= $product['price']?>円</p>
    

<?php
$subtotal=$product['price']*(1 + $taxRate);
?>

<tr>
    <td colspan="3">小計</td>
    <td><?= number_format($subtotal) ?>円
    <a href="cart-delete.php?id=<?= $id?>">削除</a></td>
</tr>
<hr>

<?php endforeach; ?>

<?php
}else{
    echo 'カートに商品はありません';
}

?>
</body>
</html>