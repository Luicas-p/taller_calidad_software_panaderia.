@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<h2 class="title mb-4">Editar Producto</h2>

<form action="{{ route('productos.update', $producto->id) }}" method="POST" class="card p-4">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}" required>
    </div>
    <div class="mb-3">
        <label for="tipo_producto_id" class="form-label">Tipo de Producto</label>
        <select name="tipo_producto_id" id="tipo_producto_id" class="form-select" required>
            @foreach($tipos as $tipo)
                <option value="{{ $tipo->id }}" {{ $producto->tipo_producto_id == $tipo->id ? 'selected' : '' }}>
                    {{ $tipo->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}" required>
    </div>
    <button type="submit" class="btn btn-dorado">Actualizar</button>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
