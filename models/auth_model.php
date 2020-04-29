<?php
class auth_model
{
    public static function getUser($nickname)
    {

        $db = DBrequests::connectDB();
        $sqlAction = 'SELECT nickname, password FROM users WHERE nickname="' . $nickname.'"';
        try {
            $result = DBrequests::requestDB($db, $sqlAction);
        }
        catch (Exception $e) {
            return false;
        }
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result = $result->fetch();
        return $result;
    }
}