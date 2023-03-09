<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Categoria;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = Categoria::all();
        return view("products.index", ["categorias" => $categorias]);
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
        // guardar producto
        //dd($request->all());
        $validatedData = $request->validate([
            'pName' => ['required', 'string', 'min:3', 'max:255'],
            "pCategoria" => ['required'],
            "pStock" => ['required', 'integer'],
            'pPrice' => ['required', 'numeric', 'min:0', 'regex:/^\d{1,8}(\.\d{1,2})?$/']
        ]);
        $producto = new Product();
        $producto->nombre=$validatedData['pName'];
        $producto->stock=$validatedData['pStock'];
        $producto->precio=$validatedData['pPrice'];
        $producto->categoria_id= $validatedData['pCategoria'];
        $saved = $producto->save();
         if ($saved) {
            session()->flash('success', 'El producto se ha guardado correctamente.');
        } else {
            session()->flash('failure','NO se agrego el producto');
        }
        return redirect()->route('products.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $categorias = Categoria::all();
        return view('products.edit', ["producto" => $product, 'categorias'=> $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nombre' => ['required', 'string', 'min:3', 'max:255'],
        'stock' => ['required', 'integer'],
        'precio' => ['required', 'numeric', 'min:0', 'regex:/^\d{1,8}(\.\d{1,2})?$/'],
        'categoria_id' => ['required', 'exists:categorias,id']
    ]);

    $producto = Product::find($id);
    $producto->nombre = $validatedData['nombre'];
    $producto->stock = $validatedData['stock'];
    $producto->precio = $validatedData['precio'];
    $producto->categoria_id = $validatedData['categoria_id'];
    $producto->save();

    return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
