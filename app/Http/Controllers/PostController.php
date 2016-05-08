<?php
namespace Dog\Http\Controllers;

use Dog\Post;
use Dog\Dog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
	public function postCreatePost(Request $request, $dog_id)
	{
		$post = new Post();
		$post->body = $request['body'];
		$post->dog_id = $dog_id;
		$post->user_id = Auth::user()->id;
		//$request->user()->posts()->save($post);
		$post->save();
		return redirect()->route('showdogs',['id' => $dog_id]);
	}
	public function getDeletePost($post_id)
	{
		$post = Post::find($post_id);
		$dog_id = $post->dog_id;
		$user_id = Auth::user()->id;
		$dog_user_id = Dog::find($dog_id)->user_id;
		if($user_id == $post->user_id  ||  $user_id == $dog_user_id)
		{
			$post->delete();
			return redirect()->route('showdogs',['id' => $dog_id]);
		}
		else
		{
			return redirect()->route('showdogs',['id' => $dog_id]);
		}

	}



}
