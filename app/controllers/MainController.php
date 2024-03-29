<?php


namespace app\controllers;


use ishop\base\Controller;
use ishop\Cache;
use \RedBeanPHP\R as R;


class MainController extends AppController {


    public function indexAction(){
        $brands = R::find('brand', 'LIMIT 3');
        $hits = R::find('product', 'hit = "1" AND status = "1" LIMIT 8');
        $this->setMeta('Main Page', 'Описание',
            'Ключевики');
        $this->set(compact('brands', 'hits'));
    }

}