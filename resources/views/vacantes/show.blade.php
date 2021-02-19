@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css" integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA==" crossorigin="anonymous" />
@endsection
@section('navegacion')
   @include('ui.adminnav')
@endsection

@section('content')
<h1 class="text-3xl text-center mt-10">{{$vacante->titulo}}</h1>

<div class="mt-10 mb-20 md:flex items-start">
    <div class="md:w-3/5 ">
        <p class="block text-gray-700 font-bold my-2">
            Publicado: <span class="font-normal">
                {{$vacante->categoria->created_at->diffForHumans()}},
                Por
                {{$vacante->reclutador->name}}
            </span>
        </p>
        <p class="block text-gray-700 font-bold my-2">
            Fecha: <span class="font-normal">
                {{$vacante->categoria->created_at->diffForHumans()}}
            </span>
        </p>
        <p class="block text-gray-700 font-bold my-2">
            Categoria: <span class="font-normal">
                {{$vacante->categoria->nombre}}
            </span>
        </p>
        <p class="block text-gray-700 font-bold my-2">
            Salario: <span class="font-normal">
                {{$vacante->salario->nombre}}
            </span>
        </p>
        <p class="block text-gray-700 font-bold my-2">
            Ubicación: <span class="font-normal">
                {{$vacante->ubicacion->nombre}}
            </span>
        </p>
        <p class="block text-gray-700 font-bold my-2">
            Experiencia: <span class="font-normal">
                {{$vacante->experiencia->nombre}}
            </span>
        </p>
        @php
         $arraySkills = explode(",", $vacante->skills)
        @endphp
        <h2 class="text-2xl text-center mt-10 text-gray-700 mb-6">Conocimientos y tecnologias</h2>
        @foreach($arraySkills as $skill)
        <p class="inline-block border border-gray-500 rounded p-2 px-8 text-gray-700 font-bold my-2">
            
                {{json_encode($skill)}}
            
        </p>
        @endforeach
        <a href="/storage/vacante/{{$vacante->imagen}}" data-lightbox="imagen" data-titulo={{$vacante->titulo}}>  
           <img src="/storage/vacante/{{$vacante->imagen}}" alt="imagen de vacante" class="w-40 mt-10">
        </a>
        <div class="descripcion mt-10 mb-5">
            {!!$vacante->descripcion!!}
        </div>
    </div>
    @include('ui.contacto')
</div>


@endsection
