@extends('layouts.app')
@section('navegacion')
   @include('ui.adminnav')
@endsection

@section('content')
<h1 class="text-3xl text-center mt-10">{{$vacante->titulo}}</h1>

<div class="mt-10 mb-20 md:flex items-start">
    <div class="md:w-3/5 ">
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

        <div class="descripcion mt-10 mb-5">
            {!!$vacante->descripcion!!}
        </div>
    </div>
    <aside class="md:w-2/5">
        2
    </aside>
</div>


@endsection
