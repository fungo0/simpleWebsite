<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use Eloquence;

    protected $searchableColumns = ['course_id', 'user_id'];
	
    protected $fillable = ['course_id', 'user_id'];

    public function Course() {
    	return $this->belongsTo('App\Course');
    }

    public function User() {
    	return $this->belongsTo('App\User');
    }
}
