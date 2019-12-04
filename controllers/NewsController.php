<?php

include_once ROOT. '/models/News.php';

class NewsController
{
    public function actionIndex(){
        $newsList = array();
        $newsList = News::getNewsList();

        print_r($newsList);
        return true;
    }

    public function actionView($category, $id){
        if($id){
            $newsItem = News::getNewsItemById($id);
            print_r($newsItem);
        }
        return true;
}
}