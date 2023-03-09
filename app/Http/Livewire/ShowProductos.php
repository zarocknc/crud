<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ShowProductos extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.show-productos', ["productos" => Product::where('nombre', 'LIKE', "%" . $this->search . "%")->get()]);
    }
    public function eliminar($id)
    {
        $producto = Product::find($id);
        $producto->delete();
    }
    public function editar($id) {
        $producto = Product::find($id);
        return redirect()->route("products.edit",["product" => $producto]);
    }
}
