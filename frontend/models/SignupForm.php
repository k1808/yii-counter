<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $password;
    public $birth_date;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['birth_date', 'string'],
            ['birth_date', 'required'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        if(User::getBirthYear($this->birth_date) < 18){
            Yii::$app->session->setFlash('danger', 'Too young!');
            return -1;
        }  elseif (User::getBirthYear($this->birth_date) > 150) {
            Yii::$app->session->setFlash('danger', 'Too old!');
            return -1;
        }
            $user = User::create($this->username, $this->password, $this->birth_date);
            $user->save();
            return 1;


    }

}
