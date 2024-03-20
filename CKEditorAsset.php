<?php
use yii\web\AssetBundle;
use yii\web\YiiAsset;
use yii\web\JqueryAsset;

class CKEditorAsset extends AssetBundle{
    public $sourcePath='@vendor/ckeditor/ckeditor5';

    public $js=[
      'ckeditor.js',
    ];

    public $jsOptions=[
        'position'=>\yii\web\View::POS_HEAD
    ];

    public $depends=[
        YiiAsset::class,
        JqueryAsset::class
    ];
}