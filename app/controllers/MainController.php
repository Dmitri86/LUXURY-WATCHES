<?php


namespace app\controllers;


use ishop\base\Controller;
use \RedBeanPHP\R as R;


class MainController extends AppController {


    public function indexAction(){
        $posts = R::findAll('ishop');
        $post = R::findOne('ishop', 'id= ?', [2] );
        $this->setMeta('Главная страница', 'Описание',
            'Ключевики');
        $name = 'John';
        $age = 30;
        $this->set(compact('name', 'age', 'posts'));

    }

}