<?php


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'INDEX';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <br><br>

    <h4>    Добро пожаловать, <?=(Yii::$app->user->identity->display_name)?Yii::$app->user->identity->display_name:Yii::$app->user->identity->username;?>   </h4>

    <a class="btn btn-warning" href="/my/logout" data-method="post">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span> Выйти</a>








</div>
