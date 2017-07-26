<?php

namespace vin\markdown;

use yii\web\AssetBundle;

class EditorMdAsset extends AssetBundle
{
    public $sourcePath = '@bower/vin.editor.md';

    public function init()
    {
        $this->css = ['css/editormd.min.css', 'css/editormd.logo.min.css', 'css/editormd.preview.min.css'];
        $this->js = ['editormd.min.js'];
    }
}