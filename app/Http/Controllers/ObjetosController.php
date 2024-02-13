<?php

namespace App\Http\Controllers;

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
        /*
        $objeto = Objeto::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Objeto ingresado correctamente',
            'objeto' => $objeto
        ],200);*/
        $objeto = new Objeto();
        $objeto->parent_id = $request->parent_id;
        $objeto->name = $request->name;
        $objeto->type = $request->type;
        $objeto->blob_id = $request->blob_id;
        $objeto->save();

        return response()->json([
            'message' => 'Objeto ingresado correctamente',
            'Objeto' => $objeto,
        ]);
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
        $objeto = DB::table('objetos')->where('id', $id)->update($request->all());
        $objeto_actualizado = DB::table('objetos')->find($id);
        return response()->json([
            'message' => 'Objeto actualizado correctamente',
            'datos actualizados' => $objeto_actualizado
        ], 200);
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
        }
        return /*view('objects.index')*/ response()->json([
            'message' => 'Objeto borrado correctamente',
            'objeto eliminado' => $objeto
        ]);
    }
}
