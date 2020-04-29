<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <style>
        .reg_container {
            height: 95vh;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid darkviolet;
            border-radius: 5px;
        }

        .reg_container > div {
            width: 25vw;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-direction: column;
            padding: 10px;
            border: 2px solid darkviolet;
            border-radius: 10px;
        }

        .reg_wrapper {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: column;
        }

        .reg_wrapper input {
            margin: 10px;
        }
        .field_wrapper{
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
        }
        .error {
            margin-top: 5px;
            position: absolute;
            color: red;
            opacity: 0.8;
            font-size: smaller;
            font-weight: bold;
        }
    </style>
</head>
<body>
<main class="reg_container">
    <div>
        <h1>Зарегистрируйтесь</h1>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
            <div class="reg_wrapper">
                <?php foreach ($userFields as $field) { ?>
                    <div class="field_wrapper">
                    <input type="<?php if ( $field === 'password' ) { echo 'password';}
                    elseif ( $field === 'e_mail' ) { echo 'email';}
                    else echo 'text';?>"
                           name="<?= $field ?>"
                           placeholder="<?= $field?>"
                           value = "<?php if (!empty($get_params)) {
                              echo $get_params[$field];
                           }?>"
                    />
                    <?php
                    if (isset($errors[$field])) echo "<span class='error'>This $field already used</span>";
                    ?>
                    </div>
                <?php } ?>
                <input type="submit" value="Зарегистрироваться">
            </div>
        </form>
    </div>
</main>

</body>
</html>