@extends('layouts.app')

@section('title', 'Agregar Tipo de Producto')

@section('content')
<h2 class="title mb-4">Agregar Tipo de Producto</h2>

<form action="{{ route('tipoproductos.store') }}" method="POST" class="card p-4">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Tipo</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <button type="submit" class="btn btn-dorado">Guardar</button>
    <a href="{{ route('tipoproductos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
