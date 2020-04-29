<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
<div class="header">
    <h2><?= $newsItem['title'] ?></h2>
    <a href="/">на главную</a>
</div>
<main>
    <p><?= $newsItem['content_full'] ?></p>
    <div><?= $newsItem['date'] ?></div>
    <p>Автор: <?= $newsItem['author']?></p>
    <a href="/news">Ко всем новостям</a>
</main>
</body>
</html>