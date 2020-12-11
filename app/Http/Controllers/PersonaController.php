<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use App\Http\Requests\PersonaStoreRequest;
class PersonaController extends Controller
{

    public function index()
    {
        $personas = Persona::all();

        return $personas;
    }


    public function store(PersonaStoreRequest $request)
    {
        $persona = Persona::create($request->all());

        return $persona;
    }

    public function show($id)
    {
        $persona = Persona::findOrFail($id);

        return $persona;
    }


    public function update(Request $request, $id)
    {
        $persona = Persona::findOrFail($id);
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->correo = $request->correo;
        $persona->telefono = $request->telefono;
        $persona->direccion = $request->direccion;

        $persona->update();

        return $persona;
    }


    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);

        $persona->delete();

        return ['data'=>'persona eliminada'];
    }
}
