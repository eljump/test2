<?php

class registration_model
{
    public static function getFields()
    {

        $db = DBrequests::connectDB();
        $sqlAction = 'SELECT * FROM users LIMIT 1';
        try {
            $result = DBrequests::requestDB($db, $sqlAction);
        } catch (Exception $e) {
            return false;
        }
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result = $result->fetch();
        $result = array_keys($result);
        return $result;
    }

    private static function checking($name, $param)
    {
        $sqlAction = 'SELECT id FROM users WHERE ' . $name . '="' . $param . '"';
        $db = DBrequests::connectDB();
        $result = DBrequests::requestDB($db, $sqlAction);
        $result = $result->fetch();
        if ($result) {
            return 'error';
        } else {
            return 'free';
        }
    }

    public static function checkFields($check_params)
    {
        $result = array();

        foreach ($check_params as $param) {
            $name = key($check_params);
            $result[$name] = self::checking($name, $param);
            next($check_params);
        }
        return $result;
    }

    public static function createUser($fields, $values)
    {

        $link = mysqli_connect(HOST, USER, PASS, DB_NAME);

        $sqlAction = "INSERT INTO users (".$fields.") VALUES ('".$values."')";
        var_dump($sqlAction);
        $result = mysqli_query($link, $sqlAction);
        return $result;
    }
}