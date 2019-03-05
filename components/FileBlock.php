<?php namespace Hollingworth\Pages\Components;

use Cms\Classes\ComponentBase;

class FileBlock extends ComponentBase
{
    public $file = [
        'path'        => '',
        'title'       => '',
        'description' => '',
    ];

    public function componentDetails()
    {
        return [
            'name'        => 'FileBlock Component',
            'description' => 'No description provided yet...',
            'icon'        => 'icon-file-o',
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function init()
    {
        $this->file = array_merge($this->file, $this->property('file'));
    }
}
