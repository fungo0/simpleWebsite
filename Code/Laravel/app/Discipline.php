<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use Eloquence;

    protected $searchableColumns = ['discipline'];
	
    protected $fillable = ['discipline'];

    public function CourseDetail() {
    	return $this->hasMany('App\CourseDetail');
    }

    public function Course() {
    	return $this->hasMany('App\Course');
    }
}
