<?php namespace Shahin\Rss;

use System\Classes\PluginBase;

/**
 * Rss Plugin Information File
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
            'name'        => 'Rss',
            'description' => 'No description provided yet...',
            'author'      => 'Shahin',
            'icon'        => 'icon-leaf'
        ];
    }
	
	 public function registerComponents()
    {
        return [
            'Shahin\Rss\Components\RssReader' => 'RssReader'
        ];
    }

}
