@extends('layouts.app')

@section('content')

<div class="panel panel-default">

   <h1>Bienvenido <small>{{Session::get('name','no existe session')}}</small></h1>


       
@endsection