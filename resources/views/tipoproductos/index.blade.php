@extends('layouts.app')

@section('title', 'Tipos de Producto')

@section('content')
<div class="container">
    <h1 class="title mb-4 text-center">Tipos de Producto</h1>

    <div class="text-end mb-3">
        <a href="{{ route('tipoproductos.create') }}" class="btn btn-dorado"> Agregar Tipo de Producto</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach ($tipos as $tipo)
            <div class="col-md-6 mb-4">
                <div class="card p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold text-uppercase">{{ $tipo->nombre }}</h5>
                        <div>
                            <a href="{{ route('tipoproductos.edit', $tipo->id) }}" class="btn btn-sm btn-outline-dark"> Editar</a>
                            <form action="{{ route('tipoproductos.destroy', $tipo->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar este tipo de producto?')">🗑️</button>
                            </form>
                        </div>
                    </div>

                    <hr>

                    @if($tipo->productos->count() > 0)
                        <ul class="list-group">
                            @foreach($tipo->productos as $producto)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $producto->nombre }}
                                    <span class="badge bg-warning text-dark">${{ number_format($producto->precio, 0, ',', '.') }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted mt-2">No hay productos en esta categoría.</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
