<?php namespace Hollingworth\Pages\Models;

use October\Rain\Database\Model;

/**
 * Page Model
 */
class Page extends Model
{
    use \Hollingworth\Taggable\Traits\Taggable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'hollingworth_pages_pages';

    /**
     * @var array Jsonable fields.
     */
    public $jsonable = ['content'];

    //
    // Finders
    //

    /**
     * Find by URL
     * 
     * @param string $url
     * @return \Hollingworth\Pages\Models\Page|null
     */
    static public function findByUrl($url)
    {
        return static::whereUrl($url)->first();
    }
}
