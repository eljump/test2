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
        .post {
            padding: 0 5px 5px 10px;
            margin: 5px;
            border: 1px solid blueviolet;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
        }

        .post:not(:last-child) {
            margin-bottom: 10px;
        }

        .post h3 {
            margin-top: 10px;
            margin-bottom: 0;
            padding-bottom: 5px;
            border-bottom: 1px solid blueviolet;
        }

        .post h3 a {
            color: black;
            text-decoration: none;
        }

        .post h3 a:hover {
            color: darkviolet;
        }

        .post p {
            padding-left: 10px;
        }

        .post div {
            align-self: flex-end;
            color: gray;
            opacity: 0.9;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>Новости</h1>
    <a href="/">на главную</a>
</div>
<main>
    <?php foreach ($newsList as $item) : ?>
        <div class="post">
            <h3><a href="<?= '/news/' . $item['id'] ?>"><?= $item['title'] ?></a></h3>
            <p><?= $item['shortcontent'] ?> <a href="<?= '/news/' . $item['id'] ?>">Читать далее...</a></p>
            <div><?= $item['date'] ?></div>
        </div>
    <?php endforeach; ?>
</main>
</body>
</html>