<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
     protected $fillable = ['name','slug','description','project_id'];

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
