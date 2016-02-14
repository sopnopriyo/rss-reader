<?php namespace Shahin\Rss\Models;

use Model;

/**
 * RssModel Model
 */
class RssModel extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'rss_feed_sources';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];
	public $timestamps = false;
    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}