<?php


namespace app\models;


use ishop\App;

class Cart extends AppModel {

    public function addToCart($product, $qty = 1, $mod = null){
        if(!isset($_SESSION['cart.currency'])){
            $_SESSION['cart.currency'] = App::$app->getProperty('currency');
        }
        if($mod){
            $ID = "{$product->id}-{$mod->id}";
            $title = "{$product->title} ({$mod->title})";
            $price = $mod->price;
        }else{
            $ID = $product->id;
            $title = $product->title;
            $price = $product->price;
        }
        if(isset($_SESSION['cart'][$ID])){
            $_SESSION['cart'][$ID]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$ID] = [
                'qty' => $qty,
                'title' => $title,
                'alias' =>$product->alias,
                'price' => round($price * $_SESSION['cart.currency']['value']),
                'img' => $product->img,

            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] +
        $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] +
        $qty  * round($_SESSION['cart.currency']['value'] * $price) :
            $qty  * round($_SESSION['cart.currency']['value'] * $price);


    }

    public function deleteItem($id){
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sunMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sunMinus;
        unset($_SESSION['cart'][$id]);

    }

    public static function recalc($curr){
        if(isset($_SESSION['cart.currency'])){
            if($_SESSION['cart.currency']['base']){
                $_SESSION['cart.sum'] = round($_SESSION['cart.sum'] * $curr->value);
            }else{
                $_SESSION['cart.sum'] = round($_SESSION['cart.sum'] / $_SESSION['cart.currency']['value'] *
                $curr->value);
            }
            foreach ($_SESSION['cart'] as $k => $v) {
                if ($_SESSION['cart.currency']['base']) {
                    $_SESSION['cart'][$k]['price'] =round($_SESSION['cart'][$k]['price'] *$curr->value);
                } else {
                    $_SESSION['cart'][$k]['price'] = round($_SESSION['cart'][$k]['price'] /
                        $_SESSION['cart.currency']['value'] * $curr->value);
                }
            }
            foreach($curr as $dk => $dv) {
                $_SESSION['cart.currency'][$dk] = $dv;
            }


        }
    }

}