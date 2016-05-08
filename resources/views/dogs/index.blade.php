@extends('layouts.master')
@section('header')
@if (isset($breed))
<a href="{{ url('/') }}">Back to the overview</a>
@endif
<h2>
All @if (isset($breed)){{ $breed->name }}@endif dogs
<br />
<br />
<a href="{{ url('dogs/create') }}" class="btn btn-primary pull-middle"> Add a new dog </a>
<a href="{{ url('dogs/mydogs') }}" class="btn btn-primary pull-right"> My Dogs </a>
</h2>
@stop
@section('content')
@foreach ($dogs as $dog)
<div class="dog">
<a href="{{ url('dogs/'.$dog->id) }}">
<img src = "{{URL::asset('/images/'.$dog->id.'_'.$dog->path)}}"  class="img-circle" alt ="pic", width ="35" height = "35" >
<strong>{{ $dog->name }}</strong> - {{ $dog->breed->name }}
</a>
</div>
<br />
@endforeach
@stop
