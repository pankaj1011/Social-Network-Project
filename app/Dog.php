<?php 


namespace Dog;

use Illuminate\Database\Eloquent\Model;


class Dog extends Model 
{
	protected $table = 'dogs';
		
	protected $fillable = ['name','date_of_birth','breed_id', 'user_id'];

	public function breed() 
	{
		return $this->belongsTo('Dog\Breed');
	}
	public function user() 
	{
		return $this->belongsTo('Dog\User');
	}
	public function like()
	{
		return $this->hasMany('Dog\Like');
	}
}
