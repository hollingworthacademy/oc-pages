<?php namespace Hollingworth\Pages\Components;

use Cms\Classes\ComponentBase;

class UrlBlock extends ComponentBase
{
    public $title;

    public $url;

    public function componentDetails()
    {
        return [
            'name'        => 'UrlBlock Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function init()
    {
        $this->title = $this->property('title');
        $this->url   = $this->property('url');
    }
}
