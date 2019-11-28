<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

	protected $fillable = ['title','slug','description','status','photo_id'];

	public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

}
