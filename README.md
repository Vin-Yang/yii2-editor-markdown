vin-yang/yii2-editor-markdown
=============================
editor.md for Yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist vin-yang/yii2-editor-markdown "*"
```

or add

```
"vin-yang/yii2-editor-markdown": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use vin\markdown\EditorMdWidget;

?>
<?php 
echo $form->field($model, 'info_md')->widget(EditorMdWidget::className(), [
                'options' => [// html attributes
                    'id' => 'editor-markdown',
                ],
                'clientOptions' => [
                    'height' => '300',
                    // 'previewTheme' => 'dark',
                    // 'editorTheme' => 'pastel-on-dark',
                    'markdown' => '',
                    //'codeFold' => true,
                    'syncScrolling' => true,
                    'saveHTMLToTextarea' => true,    // 保存 HTML 到 Textarea
                    'searchReplace' => true,
                    'watch' => true, // 关闭实时预览
                    'htmlDecode' => 'style,script,iframe|on*',            // 开启 HTML 标签解析，为了安全性，默认不开启
                    //'toolbar' => false,             //关闭工具栏
                    'placeholder' => '欢迎使用MarkDown',
                    'previewCodeHighlight' => false, // 关闭预览 HTML 的代码块高亮，默认开启
                    'emoji' => true,
                    'taskList' => true,
                    'tocm' => true,         // Using [TOCM]
                    'tex' => true,    // 开启科学公式TeX语言支持，默认关闭
                    'flowChart' => true,             // 开启流程图支持，默认关闭
                    'sequenceDiagram' => true,       // 开启时序/序列图支持，默认关闭,
                    'imageUpload' => true,
                    'imageFormats' => ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'webp'],
                    'imageUploadURL' => Url::to(['file-upload', 'type' => 'md']),
                ]
            ]
) ?>

```