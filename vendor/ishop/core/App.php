<?php


namespace ishop;


class App {

    public static $app;

    public function __construct() {
        session_start();
        $query = trim($_SERVER['QUERY_STRING'], '/');

        self::$app = Registry::instance();
        $this->getParams();
        new ErrorHandler();
        Router::dispatch($query);
    }

    protected function getParams(){
        $params = require CONF . '/params.php';
        if(!empty($params)){
            foreach ($params as $k => $v){
                self::$app->setProperty($k, $v);
            }
        }
    }

}