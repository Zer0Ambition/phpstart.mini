<?php

include_once ROOT. '/models/News.php';

class NewsController
{
    public function actionIndex(){
        $newsList = array();
        $newsList = News::getNewsList();

        echo '<pre>';
        var_dump($newsList);
        echo '<pre>';
        return true;
    }

    public function actionView($id){
        if($id) {
            $newsItem = News::getNewsItemById($id);
            echo '<pre>';
            var_dump($newsItem);
            echo '<pre>';

            return true;
        }
}