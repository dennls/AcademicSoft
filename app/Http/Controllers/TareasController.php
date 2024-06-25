<?php

namespace App\Http\Controllers;

use App\Models\Asignaciones;
use App\Models\Tareas;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tareas= Tareas::with('asignacion')->orderBy('id', 'DESC')->paginate(10);
        return view('tareas.index', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asignaciones=Asignaciones::where('estado',true)->get();
        return view('tareas.create',compact('asignaciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'asignacion_id' => 'required|exists:asignaciones,id',
            'descripcion' => 'required|string|max:500',
            'nota'=>'required|numeric',
            'fechaEntrega'=>'required',
        ]);
        $tarea=new Tareas();
        $tarea->asignacion_id = $request->asignacion_id;
        $tarea->descripcion=$request->descripcion;
        $tarea->nota = $request->nota;
        $tarea->fechaEntrega = $request->fechaEntrega;
        $tarea->entrega=false;
        if ($tarea->save()) {
            return redirect('/tareas')->with('success', 'Registro agregado correctamente!');
        }else {
            return back()->with('error', 'El registro no fué realizado!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tarea = Tareas::with('asignacion')->find($id);
        return view('tarea.show', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tarea = Tareas::find($id);
        $asignacion = Asignaciones::where('estado', true)->get();

        return view('tareas.edit', compact('tarea', 'asignacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'asignacion_id' => 'required|exists:asignaciones,id',
            'descripcion' => 'required|string|max:500',
            'nota'=>'required|numeric',
            'fechaEntrega'=>'required',
        ]);
        $tarea = Tareas::find($id);
        $tarea->asignacion_id = $request->asignacion_id;
        $tarea->descripcion=$request->descripcion;
        $tarea->nota = $request->nota;
        $tarea->fechaEntrega = $request->fechaEntrega;
        $tarea->entrega=false;
        if ($tarea->save()) {
            return redirect('/tareas')->with('success', 'Registro agregado correctamente!');
        }else {
            return back()->with('error', 'El registro no fué realizado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tarea = Tareas::find($id);
        if($tarea->delete()){
            return back()->with('success', 'Tarea eliminada exitosamente');
        } else {
            return back()->with('error', 'La tarea no se pudo eliminar!');
        }
    }
    public function estado($id)
    {
        $tarea= Tareas::find($id);
        $tarea->entrega = !$tarea->entrega;
        if($tarea->save()){
            return back()->with('success', 'Estado actualizado exitosamente');
        }else{
            return back()->with('error', 'El estado no fue actualizado');
        }
    }
}
