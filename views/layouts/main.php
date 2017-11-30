<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use pumi\assets\AppAsset;

AppAsset::register($this);

$this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru" class="no-js">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="/favicon.ico">

    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container">
    <div class="codrops-top clearfix">
       <!-- <a class="codrops-icon codrops-icon-prev" href="/"><span></span></a>-->
        <span class="right"><a class="codrops-icon codrops-icon-drop" href="/"><span></span></a></span>
    </div>



    <?= $content; ?>

</div><!-- /container -->
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>