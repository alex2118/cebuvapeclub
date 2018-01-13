<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Thread extends Model
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    

    protected $fillable = [
        'user_id', 'category_id', 'title', 'content',
    ];



    public function category()
    {
      return $this->belongsTo('App\Category');
    }



    public function user()
    {
      return $this->belongsTo('App\User');
    }



    public function tags()
    {
      return $this->belongsToMany('App\Tag');
    }



    public function subscribe()
    {

    }



    public function unsubscribe()
    {

    }



    public function subscriptions()
    {
      return $this->hasMany('App\ThreadSubscription');
    }
}
