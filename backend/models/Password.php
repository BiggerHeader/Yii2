<?php
namespace backend\models;

use common\models\Adminuser;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class Password extends Model
{

    public $password;
    public $password_repeat;

    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            ['password', 'trim'],
            ['password', 'required',],
            ['password', 'compare', 'compareAttribute' => 'password_repeat', 'message' => '两次密码不一样'],

            ['password_repeat', 'required'],
            [['password_repeat', 'password'], 'string', 'min' => 6],
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
            'password' => '密码',
            'password_repeat' => '重置密码',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function ResetPass($id)
    {
        if (!$this->validate()) {
            return null;
        }

        $user = Adminuser::find()->where(['id' => $id])->one(); ///findOne()
        $user->password = $this->password;
        $user->removePasswordResetToken();
        /* var_dump($user);
         exit();*/
        return $user->save() ? $user : null;
    }
}
