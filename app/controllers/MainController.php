<?php


namespace app\controllers;


use ishop\base\Controller;


class MainController extends AppController {


    public function indexAction(){
//        echo __METHOD__;
        $this->setMeta('Главная страница', 'Описание',
            'Ключевики');
        $name = 'John';
        $age = 30;
        $this->set(compact('name', 'age'));

    }

}