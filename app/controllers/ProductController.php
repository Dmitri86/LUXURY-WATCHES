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
        $related = R::getAll('SELECT * FROM related_product JOIN product ON
 product.id = related_product.related_id WHERE related_product.product_id = ?',
            [$product->id]);


        // запись в куки запрошеного товара

        // просмотреные товары

        // галерея
        $gallery = R::getAll('SELECT * FROM gallery WHERE product_id = ?', [$product->id]);


        // модификации

        $this->setMeta($product->title, $product->description, $product->keywords);
        $this->set(compact('product', 'related', 'gallery'));

    }
}