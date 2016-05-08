<?php namespace Dog;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model 
{
	public $timestamps = false;
	public function dogs()
	{
		return $this->hasMany('Dog\Dog');
	}
}
