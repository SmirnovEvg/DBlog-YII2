<?php

namespace app\models;

use Yii;
use yii\base\Model;


class Login extends Model
{
    public $email;
    public $password;
    
    public function rules(){
        return[
            [['email','password'],'required', 'message'=>'Ведите значение {attribute}.'],
            ['email','email', 'message'=>'Введите валидное значение {attribute}'],
            ['password','string','min'=>5, 'tooShort'=>'Длинна пароля должна быть больше 5 символов'],
            ['password','validatePassword']
        ];
        
    }

    public function validatePassword($attribute, $params){
        
        if(!$this->hasErrors()){
            $user = $this->getUser();

            if(!$user || !$user->validatePassword($this->password)){
                $this->addError($attribute, 'Email или пароль введены неверно');
            }
        }        
    }

    public function getUser(){
        return User::findOne(['email'=>$this->email]);
    }
}
