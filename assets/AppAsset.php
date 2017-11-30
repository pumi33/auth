<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace pumi\assets;
use yii\web\AssetBundle;
use DiDom\Document;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
       //'/css/default.css',
       // '/css/component.css',
       // '/css/theme.css',
       // '/css/lightbox.css'
        'https://yastatic.net/bootstrap/3.3.4/css/bootstrap.min.css'
    ];

    public $js = [
     //   "/js/classie.js",
       // "/js/uisearch.js",
       // "js/jquery.lazyload.min.js",
        // 'web/js/material.min.js'
      //  "/js/lightbox.min.js",
        //"/js/or.js",
    ];




   // public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

    public $depends = [
      //  'yii\web\YiiAsset',
       // 'yii\bootstrap\BootstrapAsset',
    ];

}