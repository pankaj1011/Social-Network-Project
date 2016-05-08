@extends('layouts.master')
@section('header')
<h2>About this site</h2>
@stop
@section('content')
There are over <?php echo $number_of_dogs; ?> dogs on this site!

@stop
