<?php


namespace ishop;


class Db{

    use TSingletone;

    protected function __construct(){
        $db = require CONF . '/config_db.php';
    }

}