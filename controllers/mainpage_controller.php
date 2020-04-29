<?php
include_once ROOT . '/models/news_model.php';

class mainpage_controller
{
    public function actionIndex() {
        $news = $this->actionGetNews();
        require_once(ROOT.'/views/mainpage_view.php');
        return true;
    }

    public function actionGetNews() {
        $params = array('id','title', 'date', 'shortcontent');
        $sort = 'date';
        $limit = 'DESC LIMIT 3';
        $news = news_model::getNews($params, $sort, $limit);
        return $news;
    }
}