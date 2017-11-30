<?php

namespace app\components;

use app\models\Auth;
use pumi\models\User;
use Yii;
use yii\authclient\ClientInterface;
use yii\helpers\ArrayHelper;

/**
 * AuthHandler handles successful authentification via Yii auth component
 */
class AuthHandler
{
    /**
     * @var ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /** Авторизация
     * @return bool
     */
    public function handle()
    {

        $attributes = $this->client->getUserAttributes();


        if ($this->client->getId() == "google") {

            $email = ArrayHelper::getValue(
                ArrayHelper::getValue(
                    ArrayHelper::getValue($attributes, 'emails'), 0), 'value');
            $id = ArrayHelper::getValue($attributes, 'id');
            $displayName = ArrayHelper::getValue($attributes, 'displayName');

        } elseif ($this->client->getId() == "facebook") {
            $email = $attributes['email'];
            $displayName = $attributes['name'];
            $id = $attributes['id'];
        }





        $user = User::find()->where([
            'email' => $email,
            'status' => User::STATUS_SUPERADMIN,
        ])->limit(1)->one();


        if (Yii::$app->user->isGuest) {


            if ($user === null) {


                $user = new User();
                $user->display_name = (string)$displayName;
                $user->username = \Yii::$app->security->generateRandomString();
                $user->email = $email;
                $user->status = User::STATUS_SUPERADMIN;
                $user->save();
                $user_id = $user->getId();

            } else {
                $user->getId();
            }


            $auth = Auth::find()->where([
                'source' => $this->client->getId(),
                'source_id' => $id,
            ])->limit(1)->one();


            if ($auth === null) {
                $auth = new Auth();
                $auth->user_id = $user_id;
                $auth->source = $this->client->getId();
                $auth->source_id = (string)$id;
                $auth->save(false);

            }


            $user->id = $user_id;

            if (Yii::$app->user->login($user, 3600)) {


                return true;
            } else {
                return false;
            }


        }
    }

}