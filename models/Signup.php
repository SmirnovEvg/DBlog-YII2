<?php
namespace app\models;

use yii\base\Model;

class Signup extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public function rules()
    {
        return [
            [['email','password', 'password_repeat', 'username'],'required', 'message'=>'Ведите значение {attribute}.'],
            ['email','email', 'message'=>'Введите валидное значение {attribute}'],
            ['email','unique','targetClass'=>'app\models\User', 'message'=>"'{value}' уже существует"],
            ['password','string','min'=>5, 'tooShort'=>'Длинна пароля должна быть больше 5 символов'],
            ['username','string','min'=>5, 'tooShort'=>'Длинна имени должна быть больше 5 символов'],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Пароли не совпадают" ],
        ];
    }
    public function signup()
    {
        $user = new User();
        
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        return $user->save();
    }
}
?>