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

Route::get('/', function() {
	    //return redirect('dogs');
	    return view('welcome');
})->name('welcome');


Route::get('about', function() {
	return view('about')->with('number_of_dogs', 9000);
});

Route::get('dogs', ['as' => 'dogs','middleware'=>'auth', function() {
	$dogs = Dog\Dog::all();
	return view('dogs.index')->with('dogs', $dogs);
}]);

Route::get('dogs/breeds/{name}',['uses' => 'DogController@show1']);
Route::post('signup', ['uses'=>'UserController@postSignUp', 'as' => 'signup']);
Route::post('/signin', ['uses'=>'UserController@postSignIn', 'as' => 'signin'] );
Route::get('dogs/create',['uses'=>'DogController@create1', 'middleware' => 'auth']);
Route::post('dogs',['uses'=>'DogController@create2','middleware'=>'auth']);




Route::get('dogs/mydogs',['as' => 'mydogs','middleware'=>'auth',function() {
		$dogs  =Dog\Dog::where('user_id','=', Auth::user()->id)->get();
	    return view('dogs.index')->with('dogs',$dogs);
}]);


Route::get('dogs/{dog}/edit', function(Dog\Dog $dog) {
	return view('dogs.edit')->with('dog', $dog);
});


Route::put('dogs/{dog}', function(Dog\Dog $dog) {
	$dog->update(Input::all());
	return redirect('dogs/'.$dog->id)
		->withSuccess('Dog has been updated.');
});

Route::get('dogs/{dog}/delete',['middleware'=>'auth',  function(Dog\Dog $dog) {
	if($dog->user_id == Auth::user()->id)
	{
		$likes =Dog\Like::where('dog_id','=',$dog->id)->get();
		foreach($likes as $like)
		{
			$like->delete();
		}
		$posts =Dog\Post::where('dog_id','=',$dog->id)->get();
		foreach($posts as $post)
		{
			$post->delete();
		}
		File::delete(public_path('images/'.$dog->id.'_'.$dog->path));
		$dog->delete();
		return redirect('dogs')
			->withSuccess('Dog has been deleted.');
	}
	else
		return redirect('dogs')
		->withError('You are not owner!.');
}]);


Route::get('dogs/{id}',['as' => 'showdogs','middleware'=>'auth', function($id) {
	$dog= Dog\Dog::find($id);
	$posts = Dog\Post::where('dog_id','=',$id)->orderBy('created_at','desc')->get();
	if($dog == NULL)
		return 'No Dogs';
	return view('dogs.show') ->with('dog', $dog)->with('posts',$posts);
}]);
Route::get('/likedog/{dog_id}',['uses' =>'LikeController@like','as' => 'dog.like']);
Route::post('/createpost/{dog_id}',['uses' =>'PostController@postCreatePost','as' => 'post.create']);
Route::post('dogs/create',['uses' =>'DogController@store','as' => 'dog.create']);


Route::get('/delete-post/{post_id}',['uses' => 'PostController@getDeletePost','as'=> 'post.delete']);

Route::auth();

Route::get('/home', 'HomeController@index');

