<?php
namespace dakodig\yii2ckeditor;

use yii\web\AssetBundle;
use yii\web\YiiAsset;
use yii\web\JqueryAsset;

class CKEditorAsset extends AssetBundle{

    public $js=[
        'https://cdn.ckeditor.com/ckeditor5/41.2.1/super-build/ckeditor.js'
    ];

    public $jsOptions=[
    ];

    public $depends=[
        YiiAsset::class,
        JqueryAsset::class
    ];
}