@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard text-center py-5" style="background-color: #fff; color: #000;">
    <h1 class="text-dorado mb-4" style="color: #D4AF37;">Bienvenido Administrador </h1>
    <p class="mb-5">Gestiona tus productos y tipos de producto desde aquí.</p>

    <div class="container">
        <div class="row justify-content-center g-4">
            <!-- Card Productos -->
            <div class="col-md-4">
                <div class="card shadow p-4 text-center border-0" style="border-radius: 20px;">
                    <h4 class="mb-3">Productos</h4>
                    <a href="{{ route('productos.index') }}" 
                       class="btn btn-dorado mt-2 px-4 py-2"
                       style="background-color: #000; color: #fff; border-radius: 10px; transition: 0.3s;">
                       Gestionar
                    </a>
                </div>
            </div>

            
            <div class="col-md-4">
                <div class="card shadow p-4 text-center border-0" style="border-radius: 20px;">
                    <h4 class="mb-3">Tipo de Producto</h4>
                    <a href="{{ route('tipoproductos.index') }}" 
                       class="btn btn-dorado mt-2 px-4 py-2"
                       style="background-color: #000; color: #fff; border-radius: 10px; transition: 0.3s;">
                       Ver Categorías
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-dorado:hover {
        background-color: #D4AF37 !important;
        color: #000 !important;
        transform: scale(1.05);
    }

    .card:hover {
        box-shadow: 0 4px 20px rgba(212, 175, 55, 0.4);
        transform: translateY(-5px);
        transition: 0.3s;
    }
</style>
@endsection
