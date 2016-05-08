@extends('layouts.master')
@section('header')
<h2>Edit a dog</h2>
@stop
@section('content')
{!! Form::model($dog, ['url' => '/dogs/'.$dog->id, 'method' => 'put']) !!}
@include('partials.forms.dog')
{!! Form::close() !!}
@stop
