@extends('layouts.app')
{{-- @section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" />
@endsection --}}
@section('navegacion')
   @include('ui.adminnav')
@endsection

@section('content')
    <h2 class="text-2xl text-center mt-10"> Nueva Vacante</h2>

    <form class="max-w-lg max-auto my-10">
        <div class="mb-5">
            <label for="password" class="block text-gray-700 text-sm mb-2">Titulo de Vacante: </label>
            <input
                id="vacante"
                type="text"
                class="p-3 bg-white-100 rounded form-input w-full @error('email') is-invalid @enderror"
                name="titulo"
                >
        </div>
        <div class="mb-5">
            <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoria: </label>
            <select 
                class="block appearance-none w-full 
                      border border-gray-100 text-gray-700 rounded leading-tight  
                      focus:outline-none focus:bg-gray-300 
                      focus:border-gray-500 p-3 bg-white"
                name="categoria" 
                id="categoria"
                >
                    <option value="" disabled selected>Selecciona</option>
                    @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="experiencia" class="block text-gray-700 text-sm mb-2">Experiencia: </label>
            <select 
                class="block appearance-none w-full 
                      border border-gray-100 text-gray-700 rounded leading-tight  
                      focus:outline-none focus:bg-gray-300 
                      focus:border-gray-500 p-3 bg-white"
                name="experiencia" 
                id="categoria"
                >
                    <option value="" disabled selected>Selecciona</option>
                    @foreach($experiencias as $experiencia)
                            <option value="{{$experiencia->id}}">{{$experiencia->nombre}}</option>
                    @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="ubicacion" class="block text-gray-700 text-sm mb-2">ubicacion: </label>
            <select 
                class="block appearance-none w-full 
                      border border-gray-100 text-gray-700 rounded leading-tight  
                      focus:outline-none focus:bg-gray-300 
                      focus:border-gray-500 p-3 bg-white"
                name="ubicacion" 
                id="categoria"
                >
                    <option value="" disabled selected>Selecciona</option>
                    @foreach($ubicaciones as $ubicacion)
                            <option value="{{$ubicacion->id}}">{{$ubicacion->nombre}}</option>
                    @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="salario" class="block text-gray-700 text-sm mb-2">Salario: </label>
            <select 
                class="block appearance-none w-full 
                      border border-gray-100 text-gray-700 rounded leading-tight  
                      focus:outline-none focus:bg-gray-300 
                      focus:border-gray-500 p-3 bg-white"
                name="salario" 
                id="categoria"
                >
                    <option value="" disabled selected>Selecciona</option>
                    @foreach($salarios as $salario)
                            <option value="{{$salario->id}}">{{$salario->nombre}}</option>
                    @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">Descripcion de Puesto </label>
           <textarea id="descripcion" name="descripcion" class="p-3 bg-gray-100 rounded from-input w-full text-gray-700"></textarea>
        </div>


        
        

        <button
            type="submit"
            class="bg-red-500 w-full hover:bg-teal-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase">
            Publicar Vacante
        </button>
    </form>
@endsection
@section('script')
{{--   <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editor = new MediumEditor('.editable', {
                toolbar : {
                    buttons: ['bold', 'italic', 'underline', 'anchor','quote' 'h2', 'h3' ],
                    static : true,
                    sticky : true
                }
            })
        })
    </script> --}}
  @endsection