<?php
include_once ROOT . '/models/news_model.php';
class news_controller
{
    public function actionIndex() {
        $params = '*';
        $sort = 'date';
        $limit = 'DESC LIMIT 10';
        $newsList = news_model::getNews($params, $sort, $limit);
        require_once(ROOT.'/views/news_view.php');
        return true;
    }
    public function actionItem()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $id = array_pop($uri);
        $newsItem = news_model::getNewsItemById($id);
        require_once(ROOT . '/views/newsitem_view.php');
        return true;
    }

    public function actionCreate() {
       /* $allFields = news_model::getNewsFields();
        $diff = array('id', 'date');
        $itemFields = array_values(array_diff($allFields, $diff));*/
        require_once(ROOT . '/views/createnewsitem_view.php');
        return true;
    }
    public function actionSet() {
        $title = $_GET['title'];
        $content_full = $_GET['content_full'];
        $shortcontent = substr($content_full, 0, 20).'...';
        $author = $_COOKIE['auth'];
        $today = date("Y-m-d");
        $fields = array($title, $today, $shortcontent, $content_full, $author);
        $fields = implode('\',\'', $fields);
        $result = news_model::setNewsItem($fields);
        if ($result) {
            header('Refresh: 0; URL=/');
        }
        else {
            header('Refresh: 0; URL=/news/create');
            echo 'Somethig go wrong, try again...';
        }
        return true;
    }
}