<?php
if(!empty($_SESSION['product'])){
?>

<tr>
    <th>商品ID</th>
    <th>商品名</th>
    <th>価格</th>
    <th>個数</th>
    <th>合計</th>
</tr>

<?php
$total = 0;
foreach($_SESSION['product'] as $id=>$product):
?>

<tr>
    <td><?= $id ?></td>
    <td><a href="detail.php?id<?= $id?>">
        <?= $product['name']?></a></td>
    <td><?= $product['price']?></td>
    <td><?= $product['count']?></td>
</tr>

<?php

}