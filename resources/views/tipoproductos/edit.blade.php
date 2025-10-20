@extends('layouts.app')

@section('title', 'Editar Tipo de Producto')

@section('content')
<h2 class="title mb-4">Editar Tipo de Producto</h2>

<form action="{{ route('tipoproductos.update', $tipoproducto->id) }}" method="POST" class="card p-4">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Tipo</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $tipoproducto->nombre }}" required>
    </div>
    <button type="submit" class="btn btn-dorado">Actualizar</button>
    <a href="{{ route('tipoproductos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
