<?php


namespace app\controllers;




use app\models\AppModel;
use app\widgets\currency\Currency;
use ishop\App;
use ishop\base\Controller;


class AppController extends Controller {

    public function __construct($route){
        parent::__construct($route);
        new AppModel();
        App::$app->setProperty('currencies', Currency::getCurrencies());
        $curr = Currency::getCurrency(App::$app->getProperty('currencies'));
        App::$app->setProperty('currency', $curr);
    }

}