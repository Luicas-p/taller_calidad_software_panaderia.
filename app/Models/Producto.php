<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'precio', 'tipo_producto_id'];

    public function tipoProducto()
    {
        return $this->belongsTo(TipoProducto::class);
    }
    public function index()
{
   
    $tipos = \App\Models\TipoProducto::with('productos')->get();
    return view('tipoproductos.index', compact('tipos'));
}


}
