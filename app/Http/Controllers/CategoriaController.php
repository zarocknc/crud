<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $added = session("added");
        $categorias = Categoria::all();
        return view("categorias.index", ["categorias" => $categorias, "added" => $added]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'categoria' => ['required', 'string', 'min:3', 'max:255'],
        ]);
        $categoria = new Categoria();
        $categoria->categoria = $validatedData['categoria'];
        $saved = $categoria->save();
        if ($saved) {
            return redirect()->route("categorias.index")->with("added", True);
        } else {
            return redirect()->route("categorias.index")->with("added", False);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', ["categoria" => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'categoria' => 'required|max:255'
        ]);
        $categoria = Categoria::find($id);
        $categoria->categoria = $request->input('categoria');
        $categoria->save();
        return redirect()->route('categorias.index')->with('success',"Categoria actualizada exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
