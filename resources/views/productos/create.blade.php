@extends('layouts.app')

@section('title', 'Agregar Producto')

@section('content')
<h2 class="title mb-4">Agregar Producto</h2>

<form action="{{ route('productos.store') }}" method="POST" class="card p-4">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="mb-3">
        <label for="tipo_producto_id" class="form-label">Tipo de Producto</label>
        <select name="tipo_producto_id" id="tipo_producto_id" class="form-select" required>
            <option value="">-- Selecciona un tipo --</option>
            @foreach($tipos as $tipo)
                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
    </div>
    <button type="submit" class="btn btn-dorado">Guardar</button>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
