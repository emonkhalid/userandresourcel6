<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name','slug','description','category_id','photo_id'];

   
    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function album()
    {
        return $this->hasOne('App\Album');
    }
}
