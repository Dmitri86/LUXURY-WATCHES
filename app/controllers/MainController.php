<?php


namespace app\controllers;


use ishop\base\Controller;
use ishop\Cache;
use \RedBeanPHP\R as R;


class MainController extends AppController {


    public function indexAction(){
        $posts = R::findAll('ishop');
        $post = R::findOne('ishop', 'id= ?', [2] );
        $this->setMeta('Главная страница', 'Описание',
            'Ключевики');
        $name = 'John';
        $age = 30;
        $names = ['Andrey', 'Jane', 'Mike'];
        $cache = Cache::instance();
//        $cache->set('test', $names);
//        $cache->delete('test');
        $data = $cache->get('test');
        if(!$data){
            $cache->set('test', $names);
        }
        debug($data);
        $this->set(compact('name', 'age', 'posts'));

    }

}