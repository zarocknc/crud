<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use Illuminate\Http\Request;

class ShowCategorias extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.show-categorias', ["categorias" => Categoria::where('categoria', "LIKE", "%" . $this->search . "%")->get()]);
    }
    public function delete($id)
    {
        //Categoria//deleteById
        $categoria = Categoria::find($id);
        if ($categoria) {
            $categoria->delete();
        } else {
            //handle errar that should never happen
        }
    }
    public function editar($id) {
        //TODO: AQUI LA CSM 
        return route("categorias.index");
    }
}
