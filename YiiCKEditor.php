<?php

namespace dakodig\yii2ckeditor;

use yii\base\Widget;
use yii\widgets\InputWidget;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * This is just an example.
 */
class YiiCKEditor extends InputWidget
{
    use OptionsTrait;

    public function init()
    {
        parent::init();
        $this->loadOptions();
    }

    public function run()
    {
        echo $this->hasModel()?$this->getActiveTextarea():$this->getTextarea();

        $this->initEditor();
    }

    protected function initEditor():void
    {
        $view = $this->getView();
        CKEditorAsset::register($view);

        $id = $this->options['id'];
        $clientOptions = !empty($this->clientOptions)?Json::encode($this->clientOptions):'{}';

        $js = [];
        $js[] = "CKEDITOR.ClassicEditor.create(document.getElementById('.$id.'),$clientOptions)";
        $js[] ="initDakodigCsrfHandler('$id')";

        if (array_key_exists('filebrowserUploadUrl', $this->clientOptions) ||
            array_key_exists('filebrowserImageUploadUrl', $this->clientOptions)) {
            $js[] = "initDakodigCsrfHandler();";
        }

        $view->registerJs(implode("\n", $js));
    }

    protected function getActiveTextarea():string
    {
        return Html::activeTextarea($this->model,$this->attribute,$this->options);
    }

    protected function getTextarea():string
    {
        return Html::textarea($this->name,$this->value,$this->options);
    }

}
