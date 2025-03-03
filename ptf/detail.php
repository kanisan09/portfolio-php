<?php
require 'header.php'; 

$pdo = new PDO(
    'mysql:host=localhost;dbname=free;charset=utf8',
    'staff',
    'password'
);

$query = 'SELECT * FROM product WHERE id = ?';
$sql = $pdo->prepare($query);
$sql->execute([$_REQUEST['id']]);

foreach($sql as $row){
?>

<div class="left-item">
                <img src="image/<?= $row['id']?>.jpg" alt="image" class=img-bdr>
</div>
<div class="right-item">
        <form action="cart-insert.php" method="post">
                    <p>商品番号:<?= $row['id']?></p>
                    <p>商品名:<?= $row['name']?></p>
                    <p>価格:<?= $row['price']?>円</p>
                    <p>
                        サイズ
                                    <select name="content" id="">
                        <option value="S">スクエア(100x100)</option>
                        <option value="A5">A5(210x148)</option>
                        <option value="A4">A4(297x210)</option>
                                    </select>
                    </p>
            <input type="hidden" name="id" value="<?= $row['id']?>">
            <input type="hidden" name="name" value="<?= $row['name']?>">
            <input type="hidden" name="price" value="<?= $row['price']?>">
            <p><form action="buy-insert.php" method="post">
            <input type="submit" value="今すぐ購入">
            </form></p>
            <p>
                <input type="submit" value="カートに追加">
            </p>
        </form>
</div>


<?php
}
?>