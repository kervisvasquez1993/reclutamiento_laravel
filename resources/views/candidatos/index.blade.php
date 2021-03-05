@extends('layouts.app')

@section('navegacion')
  @include('ui.adminnav')
@endsection
@section('content')
    <h2 class="text-2xl text-center mt-10">notificaciones : {{$vacantes->titulo}}</h2>
     
    @if(count($vacantes->candidatos) > 0)
        <ul class="max-w-md mx-auto mt-10">
            @foreach($vacantes->candidatos as $candidato)
                <li class="p-5 border border-gray-400 mb-5">
                    <p class="mb-4"> Nombre : <span class="font-bold"> {{$candidato->nombre }}</span> </p>
                    <p class="mb-4"> Nombre : <span class="font-bold"> {{$candidato->email }}</span> </p>
                    <a class="bg-blue-500 p-3 inline-block text-xs font-bold uppercase text-white" href="/storage/cv/{{$candidato->cv}}"> Ver CV</a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-center mt-5">No Hay Candidatos</p>    
    @endif 
 
@endsection