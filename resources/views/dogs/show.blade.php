@extends('layouts.master')

@section('header')
<img class="img-rounded" src = "{{URL::asset('/images/'.$dog->id.'_'.$dog->path)}}" align='right' alt ="pic", width ="125" height = "125" > 

<a href="{{ url('/dogs') }}">Back to overview</a>
<h2>
{{ $dog->name }}
</h2>

<a href="{{ url('dogs/'.$dog->id.'/edit') }}">
<span class="glyphicon glyphicon-edit"></span>
Edit
</a>

<a href="{{ url('dogs/'.$dog->id.'/delete') }}">
<span class="glyphicon glyphicon-trash"></span>
Delete
</a>

@if(Dog\Like::where('dog_id','=',$dog->id) -> where('user_id','=',Auth::user()->id)->first())
<img class="img-rounded" src = "{{URL::asset('/images/liked.png')}}" width ="20" height = "20" > 
@else
<a href="{{ route('dog.like', ['dog_id' => $dog->id ]) }}">
<img class="img-rounded" src = "{{URL::asset('/images/like.jpeg')}}" width ="20" height = "20" >
</a>
@endif
<p>Last edited: {{ $dog->updated_at->diffForHumans() }}</p>

@stop

@section('content')
<p>Date of Birth: {{ $dog->date_of_birth }}</p>
<p>
@if ($dog->breed)
Breed:
{{ link_to('dogs/breeds/'.$dog->breed->name, $dog->breed->name) }}
@endif
<p>Dog Owner: {{ $dog->user->name }}</p>

<section class="row new-post">
<div class ="col-md-6 col-md-offset-3">
<header><h3>What you want to say? </h3></header>
  <form action ="{{ route('post.create', ['dog_id' => $dog->id]) }}" method ="post">
<div class ="form-group">
<textarea class ="form-control" name="body" id ="new-post" rows ="3" placeholder="Your Post"></textarea>
<br/>
<button type="submit" class ="btn btn-primary">Create Post</button>
<input type= "hidden" value ="{{Session :: token()}}" name = "_token">
</form>
</div>
</section>


<section class = "row posts">
		@foreach ($posts as $post)
	<div class = "alert alert-info col-md-offset-3">
			<article class ="post">
				<p>{{ $post->body }} </p>
				<p> <i>Posted by {{ $post->user->name }} at {{ $post->updated_at }} </i> </p>
              <div class = "interaction">
			  <a href ="{{ route('post.delete', ['post_id' => $post->id]) }}">
				<img class="img-rounded" alt="Delete Post" src = "{{URL::asset('/images/delete.png')}}" width ="20" height = "20" >
				</a>
              </div>
			</article>
	</div>
		@endforeach
</section>

@stop
