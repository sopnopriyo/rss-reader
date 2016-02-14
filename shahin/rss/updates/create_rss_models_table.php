<?php namespace Shahin\Rss\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateRssModelsTable extends Migration
{

    public function up()
    {
        Schema::create('rss_feed_sources', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
			$table->text('name');
			$table->text('url');
            $table->text('last_build_date');  // should be int type
			$table->timestamp('created_date');
			
        });
    }

    public function down()
    {
        Schema::dropIfExists('rss_feed_sources');
    }

}
