<?php namespace Hollingworth\Pages\Classes;

use Hollingworth\Pages\Models\Page;
use Cms\Classes\Theme as CmsTheme;
use Cms\Classes\Page as CmsPage;
use Hollingworth\ContentBlocks\Classes\ContentBlockManager;

class PageManager
{
    use \October\Rain\Support\Traits\Singleton;

    public function findByUrl($url)
    {
        if (!$page = Page::findByUrl($url)) {
            return;
        }

        $cmsTheme = CmsTheme::getActiveTheme();
        $cmsPage  = CmsPage::inTheme($cmsTheme);

        $cmsPage->url    = $url;
        $cmsPage->title  = $page->title;
        $cmsPage->layout = 'default';   

        $cmsPage->viewBag['content'] = $page->content;

        return $cmsPage;
    }

    public function renderContent($cmsController, $cmsPage)
    {
        if (!isset($cmsPage->viewBag['content'])) {
            return;
        }

        $cmsController->addComponent(\Hollingworth\ContentBlocks\Components\ContentBlocks::class, '__contentBlocks', [
            'blocks' => $cmsPage->viewBag['content']
        ]);

        return $cmsController->renderComponent('__contentBlocks');
    }
}