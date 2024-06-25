<?php

namespace App\Http\Controllers;

use App\Models\Asignaciones;
use App\Models\Curso;
use Illuminate\Http\Request;

class AsignacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignaciones= Asignaciones::with('usuario','curso')->orderBy('id', 'DESC')->paginate(10);
        return view('asignaciones.index', compact('asignaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos=Curso::where('estado',true)->get();
        return view('asignaciones.create',compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required|string|max:500',
            'usuario_id' => 'required|exists:users,id',
            'curso_id' => 'required|exists:cursos,id',
            'importe'=>'required|numeric',
            'fecha_inicio'=>'required',
            'fecha_fin'=>'required',
        ]);
        $asignacion=new Asignaciones();
        $asignacion->usuario_id=auth()->user()->id;
        $asignacion->curso_id = $request->curso_id;
        $asignacion->nombre=$request->nombre;
        $asignacion->descripcion=$request->descripcion;
        $asignacion->importe=$request->importe;
        $asignacion->fecha_inicio=$request->fecha_inicio;
        $asignacion->fecha_fin=$request->fecha_fin;
        $asignacion->estado=true;
        if ($asignacion->save()) {
            return redirect('/asignaciones')->with('success', 'Registro agregado correctamente!');
        }else {
            return back()->with('error', 'El registro no fué realizado!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $asignacion = Asignaciones::with('usuario', 'curso')->find($id);
        return view('asignacion.show', compact('asignacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $asignacion = Asignaciones::find($id);
        $curso = Curso::where('estado', true)->get();

        return view('asignacion.edit', compact('asignacion', 'curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required|string|max:500',
            'usuario_id' => 'required|exists:users,id',
            'curso_id' => 'required|exists:cursos,id',
            'importe'=>'required|numeric',
            'fecha_inicio'=>'required',
            'fecha_fin'=>'required',
        ]);

        $asignacion = Asignaciones::find($id);



        $asignacion->usuario_id=auth()->user()->id;
        $asignacion->curso_id = $request->curso_id;
        $asignacion->nombre=$request->nombre;
        $asignacion->descripcion=$request->descripcion;
        $asignacion->importe=$request->importe;
        $asignacion->fecha_inicio=$request->fecha_inicio;
        $asignacion->fecha_fin=$request->fecha_fin;
        $asignacion->estado=true;
        if ($asignacion->save()) {
            return redirect('/asignaciones')->with('success', 'Registro actualizado correctamente!');
        } else {
            return back()->with('error', 'El registro no fué actualizado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignaciones $asignaciones)
    {
        //
    }
    public function estado($id)
    {
        $asignacion= Asignaciones::find($id);
        $asignacion->estado= !$asignacion->estado;
        if($asignacion->save()){
            return back()->with('success', 'Estado actualizado exitosamente');
        }else{
            return back()->with('error', 'El estado no fue actualizado');
        }
    }
}
