<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;


class Products extends Component
{
    public $products, $description, $cantidad, $id_product;
    public $modal = false;
    public function render()
    {
        $this->products = Product::all();
        return view('livewire.products');
    }
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }
    public function abrirModal()
    {
        $this->modal=true;
    }
    public function cerrarModal()
    {
        $this->modal=false;
    }
    public function limpiarCampos()
    {
        $this->description = '';
        $this->cantidad = '';
        $this->id_product = '';
    }
    public function editar($id)
    {
       $producto = Product::findOrFail($id);
       $this->id_product = $id;
       $this->description = $producto->description;
       $this->cantidad = $producto->cantidad;
       $this->abrirModal();
    }
    public function eliminar($id)
    {
       Product::find($id)->delete();
    }
    public function guardar()
    {
        Product::updateOrCreate(['id'=>$this->id_product],
            [
                'description' => $this->description,
                'cantidad' => $this->cantidad
            ]);
        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
