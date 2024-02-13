<?php

namespace App\Http\Controllers;

use App\Models\Blob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Str;

class BlobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blobs = Blob::all();
        
        return view('blob.index', compact('blobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blob.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /// Métodos duros

        // 1ra
        DB::table('blobs')->insert([
            // No ejecuta los eventos
            'id' => (string) Str::uuid(),
            'content' => '',
        ]);

        // 2da
        $blob = Blob::create([
            // No ejecuta los eventos
            'id' => (string) Str::uuid(),
            'content' => '',
        ]);

        /// Métodos suaves (es necesartio ->save();)

        // 1ra 
        $blob = new Blob([
            // Ejecuta los eventos
            //'id' => (string) Str::uuid(), -> no es necesario
            'content' => '',
        ]);

        // 2da
        $blob->fill([
            // Ejecuta los eventos
            //'id' => (string) Str::uuid(), -> no es necesario
            'content' => '',
        ]);

        // 3ra
        $blob->id = (string) Str::uuid();
        $blob->content = '';

        // Guardar
        $blob->save();

        /// Para leer

        //echo $blob['type']; // no existe
        echo $blob->content; // sí funciona

        ///----- Request

        /// Acceso

        Auth::user();

        // 1er Parámetros
        $request->user();

        // 2da helper
        request()->user();

        // 3ra facade
        FacadesRequest::user();

        /// Métodos

        // contenido
        $blob->fill(
            $request->all()
        );

        // parámetros
        $blob->fill([
            'content' => $request->content
        ]);

        // 
        $blob->fill([
            'content' => $request->file('content')->getMimeType()
        ]);


        return /*redirect()->route('blob.index')*/;
    }

    /**
     * Display the specified resource.
     */
    public function show(Blob $blob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blob $blob)
    {
        return view('blob.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blob $blob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blob $blob)
    {
        //
    }
}
