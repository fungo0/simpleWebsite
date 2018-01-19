<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use Eloquence;

    protected $searchableColumns = ['speaker', 'location', 'title', 'content'];
	
    protected $fillable = ['user_id', 'speaker', 'location', 'venue', 'title', 'content'];

    protected $hidden = ['user_id'];

    public function Comment() {
    	return $this->hasMany('App\Comment');
    }
}
