<?php 
session_start();
require 'header.php'; 

$pdo = new PDO(
    'mysql:host=localhost;dbname=free;charset=utf8',
    'staff',
    'password'
);

if(isset($_GET['delete_id'])){
    $delete_id= $_GET['delete_id'];
    $sql = $pdo->prepare('DELETE FROM board_info WHERE id = ?');
    $sql->execute([$delete_id]);
}

if($_SERVER['REQUEST_METHOD'] === 'POST' ){
$title = $_POST['title'];
$name = $_POST['name'];
$comment = $_POST['comment'];
$contributor_id = hash('sha256',$_SERVER['REMOTE_ADDR'].time());

$sql = $pdo->prepare('INSERT INTO board_info(title, name, comment, contributor_id) VALUES(?, ?, ?, ?)');
$sql->execute([$title, $name, $comment, $contributor_id]);
}

$sql = $pdo->query('SELECT * FROM board_info ORDER BY created_at DESC');
$posts = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>message</title>
    <link rel="stylesheet" href="message.css">
</head>
<body>

<div class="m-form">
    <h1>お問い合わせフォーム</h1>
    <p>～ご意見、ご感想、リクエストなどお気軽にどうぞ～</p>
    
    <form method="post">
        <p>タイトル<input type="text" name="title"></p>
        <p>お名前<input type="text" name="name"></p>
        <p>お問い合わせ内容</p>
        <p><textarea name="comment" placeholder="コメント"></textarea></p>
        <button type="submit">投稿</button>
    </form>
</div>

<?php foreach($posts as $post): ?>
        <div>
            <h3><?= htmlspecialchars($post['title']) ?></h3>
            <p>投稿者: <?= htmlspecialchars($post['name']) ?></p>
            <p><?= nl2br(htmlspecialchars($post['comment']))?></p>
            <p>投稿日時: <?= date('Y-m-d H:i:s',strtotime($post['created_at']))?></p>
            <a href="?delete_id=<?= $post['id'] ?>">削除</a>
        </div>
<?php endforeach; ?>

</body>
</html>