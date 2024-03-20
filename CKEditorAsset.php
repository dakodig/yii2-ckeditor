<?php
namespace dakodig\yii2ckeditor;

use yii\web\AssetBundle;
use yii\web\YiiAsset;
use yii\web\JqueryAsset;

class CKEditorAsset extends AssetBundle{

    public $js=[
      __DIR__.'/ckeditor/ckeditor.js',
    ];

    public $jsOptions=[
        'position'=>\yii\web\View::POS_HEAD
    ];

    public $depends=[
        YiiAsset::class,
        JqueryAsset::class
    ];
}