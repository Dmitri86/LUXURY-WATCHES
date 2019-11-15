<?php


namespace ishop;

use \RedBeanPHP\R as R;
use RedUNIT\Blackhole\Debug;

class Db {

    use TSingletone;

    protected function __construct(){
        $db = require CONF . '/config_db.php';
        R::setup($db['dsn'], $db['user'], $db['password']);
        if(!R::testConnection()){
            throw new \Exception('Нет соединения с БД', 500);
        }
        R::freeze(true);
        if(DEBUG){
            R::debug(true, 1);
        }
    }

}