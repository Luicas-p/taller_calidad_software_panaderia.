<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panadería - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
       
        body {
            background-color: #ffffff;
            color: #000000;
            font-family: 'Poppins', sans-serif;
        }

    
        nav {
            background-color: #ffffff;
            border-bottom: 2px solid #d4af37;
        }

        nav a.navbar-brand {
            color: #d4af37 !important;
            font-weight: 700;
            font-size: 1.3rem;
        }

        nav a.nav-link {
            color: #000 !important;
            font-weight: 500;
            transition: 0.3s;
        }

        nav a.nav-link:hover {
            color: #d4af37 !important;
        }

      
        .btn-dorado {
            background-color: #d4af37;
            color: #000;
            font-weight: 600;
            border: none;
        }

        .btn-dorado:hover {
            background-color: #c19e32;
            color: #fff;
        }

     
        .card {
            border: 1px solid #d4af37;
            border-radius: 12px;
            background-color: #ffffff;
        }

     
        .title {
            color: #d4af37;
            font-weight: 700;
        }

      
        table {
            border-color: #d4af37 !important;
        }

        thead {
            background-color: #f5f5f5;
        }

        th {
            color: #000;
        }

       
        .footer {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            color: #555;
            border-top: 1px solid #d4af37;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg px-4">
        <a class="navbar-brand" href="{{ route('dashboard') }}"> Panadería</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('productos.index') }}">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('tipoproductos.index') }}">Tipos de Producto</a></li>
            </ul>
        </div>
    </nav>

    <div class="container py-5">
        @yield('content')
    </div>

    <div class="footer">
        © 2025 Panadería — Todos los derechos reservados
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
