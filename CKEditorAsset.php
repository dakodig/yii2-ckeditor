<?php
namespace dakodig\yii2ckeditor;

use yii\web\AssetBundle;
use yii\web\YiiAsset;
use yii\web\JqueryAsset;

class CKEditorAsset extends AssetBundle{
    public $sourcePath='@vendor/dakodig/yii2-ckeditor/ckeditor';

    public $js=[
//      'ckeditor.js',
        'https://cdn.ckeditor.com/ckeditor5/41.2.1/super-build/ckeditor.js'
    ];

    public $jsOptions=[
        'position'=>\yii\web\View::POS_HEAD
    ];

    public $depends=[
        YiiAsset::class,
        JqueryAsset::class
    ];
}