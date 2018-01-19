<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use Eloquence;

    public $timestamps = false;

    protected $fillable = [
        'nickname', 'age', 'gender', 'DOB', 'mobile', 'country', 'icon',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'mobile', 'DOB'
    ];

    protected $searchableColumns = ['nickname', 'age', 'gender', 'DOB', 'mobile', 'country',];

    public function User() {
    	return $this->belongsTo('App\User');
    }
}
