<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Laravel\Cashier\Billable;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;
    use Eloquence;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'stripe_id', 'card_brand', 'card_last_four', 'trial_ends_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'stripe_id', 'card_brand', 'card_last_four', 'trial_ends_at',
    ];

    protected $searchableColumns = ['name', 'email'];

    /*
     * Mutators
     */
    public function setPasswordAttribute($password)
    {
        if(Hash::needsRehash($password))
            $password = Hash::make($password);

        $this->attributes['password'] = $password;
    }

    public function UserDetail() {
    	return $this->hasOne('App\UserDetail');
    }

    public function UserProfile() {
    	return $this->hasOne('App\UserProfile');
    }

    public function Blacklist() {
        return $this->belongsTo('App\Blacklist');
    }

    public function Comment() {
        return $this->hasMany('App\Comment');
    }

    public function Admission() {
        return $this->hasMany('App\Admission');
    }
}
