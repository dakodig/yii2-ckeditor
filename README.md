dakodig/yii2-ckeditor
=====================
Memudahkan Install extension CKEditor ke Yii2 Framework Project

Installation
------------

The preferred way to install this extension is through [composer](https://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist dakodig/yii2-ckeditor "dev-main"
```

or add

```
"dakodig/yii2-ckeditor": "dev-main"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
echo \dakodig\yii2ckeditor\YiiCKEditor::widget([
       'id' => 'test',
       'name' => 'test',
       'preset' => 'custom',
       'clientOptions' => [
           'toolbar' => ['bold', 'italic', 'underline'],
           'plugins' => ['Essentials', 'Paragraph', 'Bold', 'Italic']
       ]
  ]);
 
  Dengan Model
  echo $form->field($model,'annUraian')->widget(\dakodig\yii2ckeditor\YiiCKEditor::class,[
       'preset' => 'custom',
       'clientOptions' => [
           'toolbar' => ['bold', 'italic', 'underline'],
           'plugins' => ['Essentials', 'Paragraph', 'Bold', 'Italic']
       ]
  ]);
```
