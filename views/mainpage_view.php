<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
    <style>
        article {
            border: 1px solid purple;
            border-radius: 10px;
        }

        .head {
            align-self: flex-start;
            display: flex;
            justify-content: space-between;
        }
        .head h2 {
            margin: 15px 0 0 30px;
        }
        .head>a {
            padding: 8px;
            margin: 15px 30px;
            color: blanchedalmond;
            background-color: mediumpurple;
            border-radius: 10px;
            text-decoration: none;
        }
        .content {
            display: flex;
            justify-content: space-around;
        }
        .content>div {
            border: 1px solid rebeccapurple;
            margin: 10px;
            border-radius: 10px;
            width: 300px;
        }
        .content a {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
        .content h3 {
            margin: 10px;
        }
        .content p {
            margin-top: 0;
            margin-left: 15px;
            margin-right: 10px;
        }
        .content .date {
            align-self: flex-end;
            margin: 10px;
        }

    </style>
</head>
<body>
<header>
    <h1>Главная страница</h1>
</header>
<main>
    <article>
        <div class="head">
            <h2><a href="/news">Новости</a></h2>
            <a href="/news/create">придумайте новость</a>
        </div>
        <div class="content">
            <?php foreach ($news as $item) { ?>
                <div><a href="/news/<?= $item['id'] ?>">
                        <h3><?= $item['title']?></h3>
                        <p><?= $item['shortcontent']?></p>
                        <span class="date"><?= $item['date']?></span>
                    </a></div>
            <?php } ?>
        </div>
    </article>
</main>
</body>
</html>