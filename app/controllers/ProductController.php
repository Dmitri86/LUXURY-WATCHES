<?php


namespace app\controllers;


use RedBeanPHP\R;

class ProductController extends AppController {

    public function viewAction(){
        $this->layout = 'product';
        $alias = $this->route['alias'];
        $product = R::findOne('product', 'alias = ? AND status = "1"', [$alias]);
        if(!$product){
            throw new \Exception('Страница не найдена', 404);
        }

        // Хлебные крошки

        // связанные товары

        // запись в куки запрошеного товара

        // просмотреные товары

        // галерея

        // модификации

        $this->setMeta($product->title, $product->description, $product->keywords);
        $this->set(compact('product'));

    }
}