<?php
include_once ROOT . '/models/base_model.php';

class news_model extends base_model
{   public static $table = 'news';

    public static function getNews($params, $sort, $limit)
    {
        $table = news_model::$table;
        $newsList = base_model::getContent($params,$table,$sort, $limit);
        return $newsList;
    }

    public static function getNewsItemById($id)
    {
        $table = news_model::$table;
        $newsItem = base_model::getItemById($table, $id);
        return $newsItem;
    }
    public static function setNewsItem($fields)
    {
        $table = news_model::$table;
        $newsItem = base_model::setItem($table, $fields);
        return $newsItem;
    }

}