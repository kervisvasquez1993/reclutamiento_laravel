<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\Notifications\NuevoCandidato;
use App\Vacante;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // obtener id de la vacante
        $id = $request->route('id');
        //obtener los candidatos
        $vacantes  = Vacante::findOrFail($id);
        return view('candidatos.index', compact('vacantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nombre' => 'required',
            'email'  => 'required|email',
             'cv'     =>  'required|mimes:pdf', 
            'vacante_id' => 'required'
        ]);
        
        if($request->file('cv'))
        {
            $archivo = $request->file('cv');
            $nombreArchivo = time().".". $request->file('cv')->extension();
            $ubicacion = public_path('/storage/cv');
            $archivo->move($ubicacion, $nombreArchivo);
            
        }
        $vacante = Vacante::find($data['vacante_id']);
        $vacante->candidatos()->create([
            'nombre' => $data['nombre'],
            'email'  => $data['email'],
            'cv'     => $nombreArchivo
        ]);

        $reclutador = $vacante->reclutador;

        $reclutador->notify( new NuevoCandidato($vacante->titulo, $vacante->id));
        return back()->with('estado', 'Tus datos se enviaron correctamente');
        
        //primera forma 
       /*  $candidato = new Candidato();
        $candidato->nombre = $data['nombre'];
        $candidato->email = $data['email'];
        $candidato->vacante_id = $data['vacante_id'];
        $candidato->cv = '1234.pdf'; */

        /* $candidato = new Candidato($data);
        $candidato->cv = '2345.pdf'; */

       /*  $candidato = new Candidato();
        $candidato->fill($data);
        $candidato->cv = '1234.pdf';

        $candidato->save();


        $candidato->save(); */

       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
