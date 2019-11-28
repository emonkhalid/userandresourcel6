<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug','description','photo_id'];

    public function projects()
    {
        return $this->hasMany('App\Project');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }
}
