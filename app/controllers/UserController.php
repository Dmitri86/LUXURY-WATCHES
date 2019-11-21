<?php


namespace app\controllers;


use app\models\User;

class UserController extends AppController {

    public function signupAction(){
        $this->setMeta('Register');
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            debug($user);
            die;
        }
    }

    public function loginAction(){

    }

    public function logout(){

    }

}