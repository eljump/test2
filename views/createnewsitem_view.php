<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Новая новость</title>
    <style>
        main {
            display: flex;
            justify-content: center;
        }

        .wrapper {
            width: 30vw;
        }

        .fields input {
            width: 100%;
        }

        .fields textarea {
            width: 100%;
            height: 20vh;
        }
    </style>
</head>
<body>
<main>
    <div class="wrapper">
        <h1>Созидайте</h1>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
            <div class="fields">
                <h3>Название</h3>
                <input name="title" type="text"/>
                <h3>Новость</h3>
                <textarea name="content_full"></textarea>
            </div>
            <input type="submit" value="создать">
        </form>
    </div>
</main>

</body>
</html>