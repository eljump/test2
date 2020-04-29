<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Успех</title>
    <style>
        .success_container {
            height: 95vh;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid darkviolet;
            border-radius: 5px;
        }

        .s_container > div {
            width: 25vw;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-direction: column;
            padding: 10px;
            border: 2px solid darkviolet;
            border-radius: 10px;
        }

        .success_wrapper {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
        }
        .success_item {
            color: darkgreen;
        }
        .error_item {
            color: darkred;
        }
    </style>
</head>
<body>
<main class="success_container">
    <div>
        <div class="success_wrapper">
            <?= $res ? '<h3 class="success_item">Вы успешно зарегестрировались. 
                            Сейчас вы будете перенаправлены на страницу авторизации</h3>'
                : '<h3 class="error_item">Что-то пошло не так. Попробуйте ещё раз.</h3>'
            ?>
        </div>
    </div>
</main>

</body>
</html>