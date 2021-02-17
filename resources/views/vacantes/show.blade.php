@extends('layouts.app')
@section('navegacion')
   @include('ui.adminnav')
@endsection

@section('content')
<h1 class="text-3xl text-center mt-10">{{$vacante->titulo}}</h1>


@endsection
