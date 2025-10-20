@extends('layouts.app')

@section('title', 'Productos')

@section('content')
<h2 class="title mb-4">Productos</h2>

<a href="{{ route('productos.create') }}" class="btn btn-dorado mb-3">➕ Agregar Producto</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered text-center align-middle">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->tipoProducto->nombre ?? 'Sin tipo' }}</td>
                <td>${{ number_format($producto->precio, 2) }}</td>
                <td>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
