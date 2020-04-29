<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <style>
        .auth_container {
            height: 95vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border: 1px solid darkviolet;
            border-radius: 5px;
        }

        .auth_container > div {
            width: 25vw;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-direction: column;
            padding: 10px;
            border: 2px solid darkviolet;
            border-radius: 10px;
        }

        .auth_wrapper {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
        }

        .auth_wrapper input {
            margin: 10px;
        }
        .error {
            position: absolute;
            color: red;
            opacity: 0.8;
            font-size: smaller;
            font-weight: bold;
        }
        .error.nickname {
            top: 30px;
        }
        .error.pass {
            top: 71px;
        }

    </style>
</head>
<body>
<main class="auth_container">
    <div>
        <h1>Авторизуйтесь</h1>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
            <div class="auth_wrapper">
                <input type="text" name="name" placeholder="nickname"/>
                <?php
                if (isset($_GET['error'])) {
                if ($_GET['error'] == 'nickname') {
                    ?>
                    <div class="error nickname"> Wrong nickname</div>
                <?php }} ?>
                <input type="password" name="pass" placeholder="password"/>
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'pass') {
                        ?>
                        <div class="error pass"> Wrong password</div>
                    <?php }
                } ?>
                <input type="submit" value="Войти">
            </div>
        </form>
    </div>
    <a href="/registration">Или зарегистрируйтесь</a>
</main>

</body>
</html>