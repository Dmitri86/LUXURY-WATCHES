<?php


namespace app\controllers;


use app\models\User;

class UserController extends AppController {

    public function signupAction(){
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'],
                PASSWORD_DEFAULT);
                if($user->save('user')){
                    $_SESSION['success'] = 'Congratulate! Now, you can login.';
                }else{
                    $_SESSION['error'] = 'ERROR!';
                }

            }
            redirect();
        }
        $this->setMeta('Register');
    }

    public function loginAction(){
        $this->setMeta('Login');
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
                $_SESSION['success'] = 'Authorization complete.';
            }else{
                $_SESSION['error'] = 'Login/password is wrong';
            }
            redirect();
        }
    }

    public function logoutAction(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
        }
        redirect();
    }

}