<?php

namespace Dog\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Dog\Http\Requests;
//use Dog\Breed as Breed;
use Dog\Breed ;
use Dog\Dog ;


class DogController extends Controller
{
	public function show1($name)
	{

		$breed = Breed::with('dogs')
			->whereName($name)
			->first();
		return view('dogs.index')
			->with('breed', $breed)
			->with('dogs', $breed->dogs);
	}
	public function create1()
	{
		return view('dogs.create');
	}
	public function create2(Request $request)
	{
		//$dog = Dog::create(Input::all());
		$dog = new Dog();
		$dog->name = $request['name'];
		$dog->date_of_birth = $request['date_of_birth'];
		$dog->user_id = $request['user_id'];
		$dog->breed_id =$request['breed_id'];
		
		$file = $request->file('pic');
		$name = $file->getClientOriginalName();
		//$ext = $file->getClientOriginalExtension();
		//$path = $file->getRealPath();
		//return $dog->name.' '.$dog->date_of_birth.' '.$dog->user_id.' '.$dog->breed_id.' ext='.$ext.' path='.$path.' name='.$name;
		$dog->path=$name;
		$dog->save();
		//$file->move(storage_path('public/images/'.$dog->id.'_'.$name));
		//$file->move(public_path('images/'.$dog->id.'_'.$name));
		File::move($file->getRealPath(), public_path('images/'.$dog->id.'_'.$name));
		return redirect('dogs/'.$dog->id)
			->withSuccess('Dog has been created.');
	}	
}
