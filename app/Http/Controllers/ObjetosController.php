<?php

namespace App\Http\Controllers;

use App\Models\Blob;
use App\Models\Objeto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ObjetosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objetos = Objeto::all();
        /*
        return view('objects.index', compact('objetos'));

        */

        return $objetos->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('objects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // verificamos si en la respuesta contiene blob
        if ($request->has('blob')) {
            // aca creamos un blob para guardar
            $blob = new Blob();
            $blob->fill($request->blob);
            $blob->save();
            // Crea un nuevo objeto y asigna el ID del blob
            $objeto = new Objeto();
            $objeto->fill($request->except('blob'));
            $objeto->blob_id = $blob->id; 
            $objeto->save();

            return response()->json([
                'message' => 'Objeto y Blob ingresados correctamente',
                'Objeto' => $objeto,
                'Blob' => $blob,
            ]);
        } else {
            // si no proporcionamos datos para guardar un blob entonces solo creamos el objeto
            $objeto = new Objeto();
            $objeto->fill($request->all());
            $objeto->save();
            return response()->json([
                'message' => 'Objeto ingresado correctamente',
                'Objeto' => $objeto,
            ]);
        }
        /*   
        $objeto = new Objeto();
        $objeto->parent_id = $request->parent_id;
        $objeto->name = $request->name;
        $objeto->type = $request->type;

        $objeto->save();
        return response()->json([
            'message' => 'Objeto ingresado correctamente',
            'Objeto' => $objeto,
        ]);

        */
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $objeto = Objeto::find($id);
        return $objeto;
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
