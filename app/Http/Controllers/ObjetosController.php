<?php

namespace App\Http\Controllers;

use App\Models\Objeto;
use App\Models\Objetos;
use Illuminate\Http\Request;

class ObjetosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objetos = Objeto::all();
        
        return view('objects.index', compact('objetos'));
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
        //
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
        return view('object.edit');
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
