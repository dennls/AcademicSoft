<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos= Curso::orderBy('id', 'DESC')->paginate(10);
        //dd($cursos);
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'imagen'=>'nullable|image|mimes:png,jpg,jpeg',
            'descripcion'=>'nullable|string|max:200',
            'costo'=>'required|numeric',
        ]);

        if($request->file('imagen')){
            $imagen = $request->file('imagen');
            $nombreImagen = uniqid('curso_') . '.png';
            if(!is_dir(public_path('/imagenes/cursos/'))){
                // mkdir(public_path('/imagenes/categorias/') , 0777);
                File::makeDirectory(public_path().'/imagenes/cursos/',0777,true);
            }
            $subido = $imagen->move(public_path().'/imagenes/cursos/', $nombreImagen);
        } else {
            $nombreImagen = 'default.png';
        }

        $curso=new Curso();
        $curso->nombre = $request->nombre;
        $curso->imagen = $nombreImagen;
        $curso->descripcion = $request->descripcion;
        $curso->costo = $request->costo;
        $curso->estado = true;
        if($curso->save()){
            return redirect('/cursos')->with('success', 'Curso creado exitosamente');
        }else{
            return back()->with('error', 'El curso no pudo ser agregado');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $curso = Curso::find($id);
        return view('cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'=>'required',
            'imagen'=>'nullable|image|mimes:png,jpg,jpeg',
            'descripcion'=>'nullable|string|max:200',
            'costo'=>'required|numeric'
        ]);
        $curso = Curso::find($id);

        if($request->file('imagen')){
            // eliminar la imagen anterior
            if($curso->imagen != 'default.png'){
                if(file_exists(public_path().'/imagenes/cursos/'.$curso->imagen)){
                    unlink(public_path().'/imagenes/cursos/'.$curso->imagen);
                }
            }

            $imagen = $request->file('imagen');
            $nombreImagen = uniqid('curso_') . '.png';
            if(!is_dir(public_path('/imagenes/cursos/'))){
                File::makeDirectory(public_path().'/imagenes/cursos/',0777,true);
            }
            $subido = $imagen->move(public_path().'/imagenes/cursos/', $nombreImagen);
            $curso->imagen = $nombreImagen;
        }

        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->costo = $request->costo;
        if($curso->save()){
            return redirect('/cursos')->with('success', 'El curso fue actualizado');
        }else{
            return back()->with('error', 'El curso no fue actualizado');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $curso= Curso::find($id);
        if($curso->delete()){
            return back()->with('success', 'Curso eliminado exitosamente');
        }else{
            return back()->with('error', 'El curso no fue eliminado');
        }
    }
    public function estado($id)
    {
        $curso= Curso::find($id);
        $curso->estado= !$curso->estado;
        if($curso->save()){
            return back()->with('success', 'Estado actualizado exitosamente');
        }else{
            return back()->with('error', 'El estado no fue actualizado');
        }
    }
}
