<?php namespace Hollingworth\Pages;

use Backend;
use Event;
use System\Classes\PluginBase;
use Hollingworth\Pages\Classes\PageManager;
use System\Classes\CombineAssets;

/**
 * Pages Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Pages',
            'description' => 'No description provided yet...',
            'author'      => 'Hollingworth',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
        CombineAssets::registerCallback(function ($combiner) {
            $combiner->registerBundle(__DIR__.'/assets/less/pages.less');
        });
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        $pageManager = PageManager::instance();

        Event::listen('cms.router.beforeRoute', [$pageManager, 'findByUrl']);
        Event::listen('cms.page.beforeRenderPage', [$pageManager, 'renderContent']);        
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [];
    }

    /**
     * Registers front-end content blocks implemented in this plugin.
     * 
     * @return array
     */
    public function registerContentBlocks()
    {
        return [
            \Hollingworth\Pages\Components\TextBlock::class => 'hollingworth_pages_text_block',
            \Hollingworth\Pages\Components\UrlBlock::class  => 'hollingworth_pages_url_block',
            \Hollingworth\Pages\Components\RichtextBlock::class => 'hollingworth_pages_richtext_block',
            \Hollingworth\Pages\Components\FileBlock::class => 'hollingworth_pages_file_block',
        ];
    }
}
