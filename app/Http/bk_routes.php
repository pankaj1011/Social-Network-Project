<?php

/*
|--------------------------------------------------------------------------
| Applidogion Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an applidogion.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::group( [ 'middleware' => ['web'] ], function () 
//{

Route::get('/', function() {
	    //return redirect('dogs');
	    return view('welcome');
})->name('welcome');


Route::get('about', function() {
	return view('about')->with('number_of_dogs', 9000);
});

Route::get('dogs', ['as' => 'dogs', function() {
	$dogs = Dog\Dog::all();
	return view('dogs.index')->with('dogs', $dogs);
}]);

Route::get('dogs/breeds/{name}',['uses' => 'DogController@show1']);
Route::post('signup', ['uses'=>'UserController@postSignUp', 'as' => 'signup'] );
Route::post('/signin', ['uses'=>'UserController@postSignIn', 'as' => 'signin'] );
Route::get('dogs/create',['uses'=>'DogController@create1', 'middleware' => 'auth']);
Route::post('dogs',['uses'=>'DogController@create2']);



Route::get('dogs/{dog}/edit', function(Dog\Dog $dog) {
	return view('dogs.edit')->with('dog', $dog);
});


Route::put('dogs/{dog}', function(Dog\Dog $dog) {
	$dog->update(Input::all());
	return redirect('dogs/'.$dog->id)
		->withSuccess('Dog has been updated.');
});

Route::get('dogs/{dog}/delete', function(Dog\Dog $dog) {
	$dog->delete();
	return redirect('dogs')
		->withSuccess('Dog has been deleted.');
});


Route::get('dogs/{id}', function($id) {
	$dog= Dog\Dog::find($id);
	if($dog == NULL)
		return 'No Dogs';
	return view('dogs.show') ->with('dog', $dog);
});

Route::auth();

Route::get('/home', 'HomeController@index');

//});
