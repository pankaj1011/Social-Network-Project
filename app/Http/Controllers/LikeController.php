<?php

namespace Dog\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Dog\Http\Requests;
//use Dog\Breed as Breed;
use Dog\User ;
use Dog\Dog ;
use Dog\Like;


class LikeController extends Controller
{
	public function like($dog_id)
	{
		$like = new Like();
		$like->user_id = Auth::user()->id;
		$like->dog_id  = $dog_id;
		$like->save();
		  return redirect()->route('showdogs',['id' => $dog_id]);



	}	
}
