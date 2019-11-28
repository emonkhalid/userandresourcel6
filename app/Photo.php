<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'photo_path','album_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function news()
    {
        return $this->hasOne('App\News');
    }

    public function project()
    {
        return $this->hasOne('App\Project');
    }

    public function album()
    {
        return $this->belongsTo('App\Album');
    }

    public function category()
    {
        return $this->hasOne('App\Category');
    }
}
