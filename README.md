dakodig/yii2-ckeditor
=====================
Memudahkan Install extension CKEditor ke Yii2 Framework Project

Installation
------------

The preferred way to install this extension is through [composer](https://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist dakodig/yii2-ckeditor "*"
```

or add

```
"dakodig/yii2-ckeditor": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= echo $this->form->field($this->model, $this->getFieldName())
    ->widget(
        YiiCKEditor::className(),
        [
            'preset' => 'standard',
            'clientOptions' => [
                'toolbarGroups' => [
                    [
                        'name' => 'undo'
                    ],
                    [
                        'name' => 'basicstyles',
                        'groups' => ['basicstyles', 'cleanup']
                    ],
                    [
                        'name' => 'colors'
                    ],
                    [
                        'name' => 'links',
                        'groups' => ['links', 'insert']
                    ],
                    [
                        'name' => 'others',
                        'groups' => ['others', 'about']
                    ],
                ],
                'filebrowserBrowseUrl' => '/ckfinder/ckfinder.html',
                'filebrowserImageBrowseUrl' => '/ckfinder/ckfinder.html?type=Images',
                'filebrowserUploadUrl' => '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                'filebrowserImageUploadUrl' => '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                'filebrowserWindowWidth' => '1000',
                'filebrowserWindowHeight' => '700',
                'allowedContent' => true,
                'language' => 'en',
            ]
        ]
    ); ?>```
