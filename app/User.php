<?php

namespace Dog;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
	use \Illuminate\Auth\Authenticatable; /* trait */
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
	];
	public function posts()
	{
		return $this->hasMany('Dog\Post');
	}
	public function dogs()
	{
      return $this->hasMany('Dog\Dog');
	}
	public function likes()
	{
		return $this->hasMany('Dog\Like');
	}

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
