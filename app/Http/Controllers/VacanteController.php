<?php

namespace App\Http\Controllers;

use App\Salario;
use App\Vacante;
use App\Categoria;
use App\Ubicacion;
use App\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VacanteController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $vacantes = auth()->user()->vacantes; */

        $vacantes = Vacante::where('user_id', auth()->user()->id)->simplePaginate(10);
        
        return view('vacantes.index',compact('vacantes') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $experiencias = Experiencia::all();
        $ubicaciones = Ubicacion::all();
        $salarios = Salario::all();
        return view('vacantes.create', compact('salarios','categorias', 'experiencias', 'ubicaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'titulo' => 'required | min:8',
            'categoria' => 'required',
            'experiencia' => 'required',
            'ubicacion' => 'required',
            'salario' => 'required',
            'descripcion' => 'required', 
            'imagen' => 'required', 
            'skills' => 'required' 
            
            ]);
   
            
            /* almacenar en la bd  */
            auth()->user()->vacantes()->create([
                'titulo' => $data['titulo'],
                'imagen' => $data['imagen'],
                'descripcion' => $data['descripcion'],
                'skills' => $data['skills'],
                'experiencia_id' => $data['experiencia'],
                'categoria_id' => $data['categoria'],
                'ubicacion_id' => $data['ubicacion'],
                'salario_id' => $data['salario'],
            ]);

            return redirect()->action('VacanteController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        return view('vacantes.show', compact('vacante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacante $vacante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacante  $vacante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacante $vacante)
    {
        //
    }

    public function imagen(Request $request){
        $imagen = $request->file('file');
        $nombreImagen = time() . '.'. $imagen->extension();
        $imagen->move(public_path('storage/vacante'), $nombreImagen);
        return response()->json(['correcto' =>$nombreImagen]);
    }

    public function borrarImagen( Request $request)
    {
            if($request->ajax())
            {
                 $imagen = $request->get('imagen');
                if(File::exists('/storage/vacante'.$imagen))
                {   
                    File::delete('storage/vacante'.$imagen);
                }

                return response('Imagen Eliminada', 200);
            }
    }
}
