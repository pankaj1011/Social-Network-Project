<?php

namespace Dog;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	 protected $fillable = [ 'user_id','dog_id'];
	public function user()
	{
		return $this->belongsTo('Dog\User');
	}
	public function dog()
	{
		return $this->belongsTo('Dog\Dog');
	}

}
