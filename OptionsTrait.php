<?php

namespace dakodig\yii2ckeditor;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

trait OptionsTrait
{
    /**
     * @var string
     */
    public $preset = 'standard';
    /**
     * @var string
     */
    public $editorType = 'Classic';
    /**
     * @var int
     */
    public $height = 100;
    /**
     * @var array
     */
    public $clientOptions = [];

    protected function loadOptions(): void
    {
        $options = [];
        if ($this->preset == 'custom') {
            $optionsFile = null;
        } else {
            $optionsFile = __DIR__ . '/presets/' . ucwords($this->preset) . '.php';
        }

        if ($optionsFile !== null) {
            if (!is_file($optionsFile)) {
                throw new InvalidConfigException('The CKEditor options file can not be loaded.');
            }
            $options = require($optionsFile);
        }

        $this->clientOptions = ArrayHelper::merge(
            $options,
            $this->clientOptions
        );
    }
}