<?php

namespace Dog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [ 'user_id' ,'post','dog_id'];
   public function user()
   {
	   return $this->belongsTo('Dog\User');
   
   }
   public function dog()
   {
	   return $this->belongsTo('Post\Dog');
   }
}
