<?php
namespace Dog\Http\Controllers;
use Dog\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
	public function postSignup(Request  $request)
	{
		$this->validate($request,[
			'email'=>'required|email|unique:users',
			'first_name'=>'required|max:120',
			'password'=>'required|min:4'
			]);

		$email = $request['email'];
		$first_name = $request['first_name'];
		$password = bcrypt($request['password']);
		$user = new User();
		$user->email =$email;
		$user->name = $first_name;
		$user->password = $password;
		$user->save();
		return redirect()->route('welcome')
			->withSuccess('Registration Successful.');
		
	}
	public function postSignIn(Request  $request)
	{
		$this->validate($request,[
			'email'=>'required',
			'password'=>'required'
			]);
		if(Auth::attempt(['email' =>$request['email'],'password' => $request['password']]))
		{
			return redirect()->route('dogs');
		}
		return view('welcome');
		
	}

}



