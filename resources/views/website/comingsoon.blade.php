@extends('website.layouts.master')
@section('content')
<style>
    .jumbotron{
        background: #009fbd0a;
    padding-top: 120px;
    padding-bottom: 120px;
    }
</style>
<div class="jumbotron text-center">
  <h1 class="display-3">Coming Soon !</h1>
  
  <hr>
 
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="{{route('website.index')}}" role="button">Continue to homepage</a>
  </p>
</div>
@stop
