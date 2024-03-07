<?php

namespace App\Http\Controllers;

use App\Models\Blob;
use App\Models\Objeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObjetosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objetos = Objeto::orderBy('type')->get();
        return view('objects.main',)->with('objetos', $objetos);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carpetas = DB::table('objetos')->where('type', 'folder')->get();
        return view('objects.create', compact('carpetas'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Verificamos si en la solicitud el campo content viene vacio
        if ($request->content == null) {

            $objeto = new Objeto();
            $objeto->parent_id = $request->parent;
            $objeto->name = $request->name;
            $objeto->type = $request->type;
            $objeto->save();
        } else {


            $blob = new Blob();
            $blob->content = $request->content;
            $blob->save();

            // Crea un nuevo objeto y asigna el ID del blob
            $objeto = new Objeto();
            $objeto->parent_id = $request->parent;
            $objeto->name = $request->name;
            $objeto->type = $request->type;
            $objeto->blob_id = $blob->id;
            $objeto->save();
        }

        return redirect()->route('objects.main');
    }



    /**
     * Display the specified resource.
     */
    public function show(Request $request, Objeto $objeto)
    {
        if ($request->expectsJson()) {
            return response()->json($objeto);
        }

        return view('display')->with('objeto', $objeto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Objeto $objeto)
    {
        return view('objects.edit', compact('objeto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $objeto = Objeto::find($id);
        if ($objeto != null) {
            $objeto->update($request->all());
            return response()->json([
                'message' => 'Objeto actualizado correctamente',
                'datos actualizados' => $objeto
            ], 200);
        } else {
            return response()->json([
                'message' => 'Objeto con id no encontrado o no existe'
            ]);
        }



            /*redirect()->route('objects.show')*/;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $objeto = Objeto::find($id);
        if ($objeto != null) {
            $objeto->delete();
        } else {
            return response()->json(['message' => 'El registro con el id proporcionado no existe'], 404);
        }
        return /*view('objects.index')*/ response()->json([
            'message' => 'Objeto borrado correctamente',
            'objeto eliminado' => $objeto
        ]);
    }
}
