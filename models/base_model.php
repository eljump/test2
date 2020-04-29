<?php

abstract class base_model
{
    protected static function getContent($positions, $table, $sort, $limit)
    {
        $db = DBrequests::connectDB();
        $sqlParams =  $positions != '*' ? implode(',', $positions) : $positions;
        $sqlAction = 'SELECT ' . $sqlParams . ' FROM ' . $table . ' ORDER BY ' . $sort . ' ' . $limit;
        try {
            $result = DBrequests::requestDB($db, $sqlAction);
        } catch (Exception $e) {
            return false;
        }
        $list = array();
        if ($positions == '*') {
            $sqlKeys = 'select * from '.$table.' ORDER BY ' . $sort . ' DESC LIMIT 1';
            try {
                $positions = DBrequests::requestDB($db, $sqlKeys);
            } catch (Exception $e) {
                return false;
            }
            $positions = array_keys($positions->fetch());
        }
        for ($i = 0; $row = $result->fetch(); $i++) {
            foreach ($positions as $key) {
                $list[$i][$key] = $row[$key];
            }
        }
        return $list;
    }

    public static function getItemById($table,$id)
    {
        $db = DBrequests::connectDB();
        $sqlAction = 'SELECT * FROM '.$table.' WHERE id=' . $id;
        $result = DBrequests::requestDB($db, $sqlAction);
        $result -> setFetchMode(PDO::FETCH_ASSOC);
        $item = $result->fetch();
        return $item;
    }

    public static function setItem($table,$fields)
    {
        $db = DBrequests::connectDB();
        $sqlKeys = 'select * from '.$table.' LIMIT 1';
        try {
            $positions = DBrequests::requestDB($db, $sqlKeys);
        } catch (Exception $e) {
            return false;
        }
        $positions->setFetchMode(PDO::FETCH_ASSOC);
        $positions = array_keys($positions->fetch());
        array_shift($positions);
        $positions= implode(',', $positions);

        $link = mysqli_connect(HOST, USER, PASS, DB_NAME);
        $sqlAction = "INSERT INTO ".$table." (".$positions.") VALUES ('".$fields."')";
        $result = mysqli_query($link, $sqlAction);
        return $result;
    }
}