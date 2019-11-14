<?php


namespace ishop\base;


abstract class Controller {

    public $route;
    public $controller;
    public $model;
    public $view;
    public $data = [];
    public $prefix;
    public $layout;
    public $meta = ['title' => '', 'desc' => '', 'keywords' => ''];

    public function __construct($route){
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
        $this->model = $route['controller'];
    }

    public function set($data){
        $this->data = $data;
    }

    public function setMeta($title = '', $desc = '', $keywords = ''){
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['$keywords'] = $keywords;
    }

    public function getView(){
        $viewObject = new View($this->route, $this->layout,
            $this->view, $this->meta);
        $viewObject->render($this->data);
    }


}