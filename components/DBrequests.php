<?php
abstract class DBrequests
{
    public static function connectDB()
    {
        /*//проверка коннекта с бд
            $link = mysqli_connect(HOST, USER, PASS);

        if ($link == false){
            print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        }
        else {
            print("Соединение установлено успешно <br/>");
            echo DB_NAME.'<br/>';
        }*/
        try {
            $db = new PDO('mysql:host=' . HOST . '; dbname=' . DB_NAME, USER, PASS);
        } catch (PDOException $e) {
            die('Подключение не удалось: ' . $e->getMessage());
        }
        return $db;
    }

    public static function requestDB($db, $sqlAction)
    {
        try {
            $result = $db->query($sqlAction);
        } catch (Exception $e) {
            die('Запрос не выполнен: ' . $e->getMessage());
        }
        return $result;
    }
}