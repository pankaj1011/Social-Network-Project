@extends('layouts.master')
@section('header')
<a href="{{ url('/dogs') }}">Back to the overview</a>
<h2>Add a new dog</h2>
@stop
@section('content')
{!! Form::open(['url' => '/dogs','files'=> true]) !!}
{!! Form::file('pic') !!}
@include('partials.forms.dog')
{!! Form::close() !!}

@stop
