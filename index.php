<?php
require 'db.php';
$sth = $pdo->prepare("SELECT * FROM threads ORDER BY created_at DESC");
$sth->execute();
$threads = $sth->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forum</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Forum Konuları</h1>
    <a href="new.php" class="btn btn-success mb-3">Yeni Konu Aç</a>
    <ul class="list-group">
        <?php foreach ($threads as $thread): ?>
            <li class="list-group-item">
                <h5><?= htmlspecialchars($thread['title']) ?></h5>
                <p><?= nl2br(htmlspecialchars($thread['content'])) ?></p>
                <small><?= $thread['created_at'] ?></small>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
