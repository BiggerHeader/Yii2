<?php
namespace backend\models;

use common\models\Adminuser;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $nickname;
    public $profile;
    public $password_hash;
    public $password_reset_token;
    public $auth_key;

    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\Adminuser', 'message' => '用户已经存在。'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Adminuser', 'message' => '邮箱地址已经别使用了。'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['profile','string'],

          /*  ['nickname','required',],
            ['nickame','string','max'=>128,]*/
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'nickname' => '别名',
            'password' => '密码',
            'email' => 'Email',
            'profile' => '简介',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'auth_key' => 'Auth Key',
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new Adminuser();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = '*****';
        $user->profile =$this->profile;

        //总是为空  nickname
        $user->nickname = 'XXXXXXXXXXXXXXXXx';//$this->nickname;

        $user->setPassword($this->password);
        $user->generateAuthKey();

       /* var_dump($user);
        exit();*/
        return $user->save() ? $user : null;
    }
}
