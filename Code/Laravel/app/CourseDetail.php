<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
    public $timestamps = false;
	
    protected $fillable = ['course_id', 'discipline_id', 'user_id'];

    public function Course() {
    	return $this->belongsTo('App\Course');
    }

    public function Discipline() {
    	return $this->belongsTo('App\Discipline');
    }
}
