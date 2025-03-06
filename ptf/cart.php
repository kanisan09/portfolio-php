<?php
if(!empty($_SESSION['product'])){
?>

<tr>
    <th>商品ID</th>
    <th>商品名</th>
    <th>価格</th>
    <th>個数</th>
    <th>小計</th>
</tr>

<?php
$total = 0;
$taxRate = 0.05; //消費税５％
foreach($_SESSION['product'] as $id=>$product):
 
?>

<tr>
    <td><?= $id ?></td>
    <td><a href="detail.php?id<?= $id?>">
    <p><a href="detail.php?id=<?= $row['id']?>">
        <img src="image/1.<?= $row['id']?>.jpg" alt=""></a>
    </p>
    <td><?= $product['name']?></a></td>
    <td><?= $product['price']?></td>
</tr>


<?php
$subtotal=$product['price']*(1 + $taxRate);
$total += $subtotal;
?>

<tr>
    <td colspan="3">小計</td>
    <td><?= $subtotal ?>
    <a href="cart-delete.php?id=<?= $id ?>">削除</a>

</td>
</tr>

<?php endforeach; ?>

<tr>
    <td colspan="4">合計</td>
    <td><?= $total ?></td>
</tr>
</table>

<?php
}else{
    echo 'カートに商品はありません';
}

?>