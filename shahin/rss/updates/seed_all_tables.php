<?php namespace Shahin\Rss\Updates;

use Seeder;
use Shahin\Rss\Models\RssModel;

class SeedUsersTable extends Seeder
{
    public function run()
    {
        RssModel::create([
            'name'                 => 'Gamespot News',
            'url'                  => 'http://www.gamespot.com/feeds/news/',
            'last_build_date'      => strtotime(date('Y-m-d H:i:s')),
            'created_date'         => date('Y-m-d H:i:s'),
            
        ]);

         RssModel::create([
            'name'                 => 'Gamespot Reviews',
            'url'                  => 'http://www.gamespot.com/feeds/reviews/',
            'last_build_date'      => strtotime(date('Y-m-d H:i:s')),
            'created_date'         => date('Y-m-d H:i:s'),
            
        ]);

         RssModel::create([
            'name'                 => 'Ign Rss ',
            'url'                  => 'http://ap.ign.com/feed.xml',
            'last_build_date'      => strtotime(date('Y-m-d H:i:s')),
            'created_date'         => date('Y-m-d H:i:s'),
            
        ]);
    }
}