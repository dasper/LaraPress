<?php namespace LaraPress\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Option extends Eloquent
{

    protected $table = 'options';
    protected $primaryKey = 'option_id';
    protected $fillable = array('option_value');

    /**
     * Used to migrate site URL
     */
    public function loadAllOptions()
    {
        $sql = "SELECT option_name, option_value FROM wp_options WHERE autoload = 'yes'";
    }

    public function getOption($optionName = 'siteurl')
    {
        return self::
        select('option_value')
            ->where('option_name', '=', $optionName)
            ->first();
    }

    public function updateSiteRef($oldSite, $newSite)
    {
        //$sql = "UPDATE wp_posts SET post_content = REPLACE (post_content, 'src=\"http://www.myoldurl.com', 'src=\"http://www.mynewurl.com')";
        $result = array();
        $result['names'] = self::where('option_name', 'home')
            ->orWhere('option_name', 'siteurl')
            ->update(array('option_value' => "replace(option_value, '$oldSite', '$newSite')"));
        //$result['options'] = self::update(array('option_value' => "replace(option_value, '$oldSite', '$newSite')"));
        //$result['posts'] = DB::table('wp_posts')->update(array('post_content' => "replace(post_content, '$oldSite', '$newSite')"));
        return $result;
    }

    /**
     * Disable or Enable All WordPress Plugins
     */
    public function disablePlugins()
    {
        //$sql = "UPDATE wp_options SET option_value = 'a:0:{}' WHERE option_name = 'active_plugins'";
        return self::where('option_name', 'active_plugins')
            ->update(array('option_value' => "a:0:{}"));
    }

}
