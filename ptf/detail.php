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
                    <div class="font-bdr">
                        <p>商品ID: 000<?= $row['id']?></p>
                        <hr>
                        <p>商品名　<?= $row['name']?></p>
                        <hr>
                        <p>価格　　<?= $row['price']?>円</p>
                        <hr>
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
            <p>
                <input type="submit" value="カートに追加" class="dtl-button">
            </p>
        </form>
        <p>    
                <form action="login-input.php" method="post">
                    <input type="submit" value="今すぐ購入"class="dtl-button">
                </form>
        </p>
</div>


<?php
}
?>