<?php


namespace app\models;


use RedBeanPHP\R;

class User extends AppModel {

    public $attributes = [
        'login' => '',
        'password' => '',
        'name' => '',
        'email' => '',
        'address' => '',
    ];

    public $rules = [
      'required' => [
          ['login'],
          ['password'],
          ['name'],
          ['email'],
          ['address'],
      ],
      'email' => [
          ['email'],
      ],
      'lengthMin' => [
          ['password', 4],
      ]
    ];

    public function checkUnique(){
        $user = R::findOne('user', 'login = ? OR email = ?',
            [$this->attributes['login'], $this->attributes['email']]);
        if($user){
            if($user->login == $this->attributes['login']){
                $this->errors['unique'] = ['This login has already been used'];
            }
            if($user->email == $this->attributes['email']){
                $this->errors['unique'] = ['This email has already been used'];
            }
            return false;
        }
        return true;
    }

}