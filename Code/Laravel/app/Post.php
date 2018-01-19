<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	use Eloquence;

	protected $searchableColumns = ['title', 'body'];
	
    protected $fillable = [
        'title', 'body'
    ];
}
