<aside class="md:w-2/5 bg-blue-500 p-5 rounded m-3">
    <h3 class="text-2xl my-3 text-white uppercase font-bold text-center">Contacta al reclutador</h3>
    <form 
    action="{{route('candidato.store')}}"
    method="POST"
    enctype="multipart/form-data"
    >
    @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-white text-sm font-bold mb-4">
                Nombre:
            </label>
            <input type="text" 
                id="nombre"
                class="p-3 bg-gray-100 rounded form-input w-full
                 @error('nombre') border border-red-500 @enderror"
                name="nombre" 
                value="{{old('nombre')}}"
                placeholder="Tu Nombre"
                />
                @error('nombre')
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                        <p>{{$message}}</p>
                    </div>
                @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-white text-sm font-bold mb-4">
                Email:
            </label>
            <input type="text" 
                id="email"
                class="p-3 bg-gray-100 rounded form-input w-full
                 @error('email') border border-red-500 @enderror"
                name="email" 
                value="{{old('email')}}"
                placeholder="Tu email"
                />
                @error('email')
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                        <p>{{$message}}</p>
                    </div>
                @enderror
        </div>
        <div class="mb-4">
            <label for="cv" class="block text-white text-sm font-bold mb-4">
                Curriculum (PDF):
            </label>
            <input type="file" 
                id="cv"
                class="p-3  rounded form-input w-full
                 @error('cv') border border-red-500 @enderror"
                name="cv"
                accept="application/pdf"
                />
                @error('cv')
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 w-full mt-5" role="alert">
                        <p>{{$message}}</p>
                    </div>
                @enderror
        </div>
        <input type="hidden" name="vacante_id" value="{{$vacante->id}}">
        <input type="submit" class="bg-green-600 w-full hover:bg-green-700 text-gray-100  p-3 focus:outline-none focus:shadow-outline uppercase"
        value="contactar"
        >
    </form>
</aside>