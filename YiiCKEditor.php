<?php

namespace dakodig\yii2ckeditor;

use yii\base\Widget;
use yii\web\JsExpression;
use yii\widgets\InputWidget;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Berikut contoh penggunaan YiiCKEditor
 *
 * Tanpa Model
 * echo \dakodig\yii2ckeditor\YiiCKEditor::widget([
 *      'id' => 'test',
 *      'name' => 'test',
 *      'preset' => 'custom',
 *      'clientOptions' => [
 *          'toolbar' => ['bold', 'italic', 'underline'],
 *          'plugins' => ['Essentials', 'Paragraph', 'Bold', 'Italic']
 *      ]
 * ]);
 *
 * Dengan Model
 * echo $form->field($model,'annUraian')->widget(\dakodig\yii2ckeditor\YiiCKEditor::class,[
 *      'preset' => 'custom',
 *      'clientOptions' => [
 *          'toolbar' => ['bold', 'italic', 'underline'],
 *          'plugins' => ['Essentials', 'Paragraph', 'Bold', 'Italic']
 *      ]
 * ]);
 *
 *
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
        if ($this->hasModel()) {
            echo $this->getActiveTextarea();
        } else {
            echo $this->getTextarea();
        }

        $this->initEditor();
    }

    protected function initEditor(): void
    {
        $view = $this->getView();
        CKEditorAsset::register($view);

        $id = $this->options['id'];
        $height = empty($this->options['height'])?$this->height:$this->options['height'];
        $clientOptions = Json::encode($this->clientOptions);

        /**
         * Ini untuk debug
         * console.log( 'Editor was initialized', editor );
         */
        $js = new JsExpression(
            "CKEDITOR.".$this->editorType."Editor.create(document.querySelector('#{$id}'),$clientOptions)"
            .".then( editor => {window.editor = editor; editor.ui.view.editable.element.style.height = '{$height}px';})"
            .".catch( error => {console.error( error );} )"
        );

        $view->registerJs($js);
    }

    protected function getActiveTextarea(): string
    {
        return Html::activeTextarea($this->model, $this->attribute, $this->options);
    }

    protected function getTextarea(): string
    {
        return Html::textarea($this->name, $this->value, $this->options);
    }

}
