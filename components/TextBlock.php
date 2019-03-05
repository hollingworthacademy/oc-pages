<?php namespace Hollingworth\Pages\Components;

use Cms\Classes\ComponentBase;

class TextBlock extends ComponentBase
{
    public $value;

    public function componentDetails()
    {
        return [
            'name'        => 'TextBlock Component',
            'description' => 'No description provided yet...',
            'icon'        => 'icon-file-text'
        ];
    }

    public function init()
    {
        $this->value = $this->property('value');
    }
}
