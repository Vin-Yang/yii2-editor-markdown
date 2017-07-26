<?php

namespace vin\markdown;

use yii\bootstrap\InputWidget;
use yii\helpers\Html;
use yii\helpers\Json;

class EditorMdWidget extends InputWidget
{
    /**
     * editor options
     * @var array
     */
    public $clientOptions = [];

    /**
     * Renders the widget.
     */
    public function run()
    {
        if ($this->hasModel()) {
            $this->name = empty($this->options['name']) ? Html::getInputName($this->model, $this->attribute) :
                $this->options['name'];
            $this->value = Html::getAttributeValue($this->model, $this->attribute);
        }
        echo Html::tag('div', '', $this->options);
        $this->registerClientScript();
    }

    protected function registerClientScript()
    {
        $view = $this->getView();
        $this->initClientOptions();
        $editor = EditorMdAsset::register($view);
        $this->clientOptions['value'] = $this->value ? $this->value : '';
        $this->clientOptions['name'] = $this->name;
        $this->clientOptions['path'] = $editor->baseUrl . '/lib/';
        $jsOptions = Json::encode($this->clientOptions);
        $id = $this->options['id'];

        if ($this->clientOptions['emoji']) {
            $emoji = 'editormd.emoji = ' . Json::encode(['path' => 'http://www.webpagefx.com/tools/emoji-cheat-sheet/graphics/emojis/', 'ext' => ".png"]);
            $view->registerJs($emoji);
        }
        $js = 'var openEditor = editormd("' . $id . '", ' . $jsOptions . ');';
        $view->registerJs($js);
    }

    public function initClientOptions()
    {

        $options = [
            'watch' => true,
            'emoji' => true,
            'syncScrolling' => true,
            'searchReplace' => true,
            'taskList' => true,
            'tocm' => true,
            'tex' => true,
            'flowChart' => true,
            'sequenceDiagram' => true,
            'height' => "600",
            'htmlDecode' => "style,script,iframe|on*",
            'placeholder' => "欢迎使用MarkDown编辑器",
            'toolbarIcons' => [
                "undo", "redo", "|",
                "h1", "h2", "h3", "h4", "h5", "h6", "|",
                "bold", "del", "italic", "quote", "list-ul", "list-ol", "hr", "pagebreak", "|",
                "code", "preformatted-text", "code-block", "|",
                "image", "table", "link", "reference-link", "|",
                "datetime", "emoji", "html-entities", "|",
                "search", "goto-line", "ucwords", "uppercase", "lowercase", "clear", "|",
                "preview", "watch", "fullscreen", "|",
                "help"
            ],
        ];

        $this->clientOptions = array_merge($options, $this->clientOptions);
    }
}