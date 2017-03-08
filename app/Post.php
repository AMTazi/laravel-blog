<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Add edited field
     *
     * @var array
     */
    protected $fillable = ['title','body','published_at','user_id'] ;

    /**
     * Add published_at attribute
     * @var array
     */
    protected $dates = ['published_at'] ;


    /**
     * Add scope
     *
     * @param $query
     */
    public function scopePublished($query)
    {
        $query->where('published_at' ,'<=',Carbon::now());
    }

    /**
     * Add scope
     *
     * @param $query
     */
    public function scopeUnpublished($query)
    {
        $query->where('published_at' ,'>',Carbon::now());
    }


    public function scopeTagId($query)
    {
        $query->tags->lists('id')->all() ;
    }

    /**
     *
     * Set Condition to the given Attribute
     *
     * @param $date
     * @return static
     */
    public function setPublishedAtAttribute($date)
    {
        return $this->attributes['published_at'] = Carbon::parse($date) ;
    }
    public function getPublishedAtAttribute($date)
    {

        return Carbon::parse($date)->format('Y-m-d') ;
    }

    /**
     * get User who create an given Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
       return $this->belongsTo('User') ;
    }

    /**
     *
     * get the tags associated with given post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps() ;
    }

    public function scopeTagList()
    {
        return $this->tags->lists('id')->all() ;
    }


    public function getTagListAttribute()
    {
        
        return $this->scopeTagList() ;
    }




}
