<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use Eloquence;

    protected $searchableColumns = ['duration', 'level', 'location', 'name'];
	
    protected $fillable = ['duration', 'level', 'location', 'name'];

    public function CourseDetail() {
    	return $this->hasOne('App\CourseDetail');
    }

    public function Discipline() {
    	return $this->belongsTo('App\Discipline');
    }

    public function Admission() {
        return $this->hasMany('App\Admission');
    }
}
