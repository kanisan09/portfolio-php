<?php 

require 'header.php'; 
?>


<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=free;charset=utf8',
    'staff',
    'password'
);

if(isset($_REQUEST['keyword'])){
    $query = 'SELECT * FROM product WHERE name LIKE ?';
    $sql = $pdo->prepare($query);
    $sql->execute(['%'.$_REQUEST['keyword'].'%']);
}else{
    $query = 'SELECT * FROM product';
    $sql = $pdo->query($query);
};
?>


<div class="container">
    <div class="search-bar">
        <form action="product.php" method="post">
            <input type="text" name="keyword">
            <input type="submit" value="検索">
        </form>
    </div>
    
    
    <div class="product-list">
        <?php
        foreach($sql as $row){
        ?>
        
        
        
        <div class="item">
            <div class="id">
                <span><?= $row['id']?></span>
            </div>
            <a href="detail.php?id=<?= $row['id']?>"><?= $row['name']?></a>
            <span><?= $row['price']?>円</span>
            <p><a href="detail.php?id=<?= $row['id']?>"><img src="image/1.<?= $row['id']?>.jpg" alt=""></a></p>
        </div>
        
        <?php
        };
        ?>
    </div>
</div>

