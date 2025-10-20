<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panadería El Dorado - Iniciar Sesión</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #000000 50%, #1a1a1a 100%);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: #fff;
            color: #000;
            border-radius: 20px;
            box-shadow: 0 0 25px rgba(255, 215, 0, 0.3);
            width: 400px;
            padding: 30px;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: #b8860b;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-dorado {
            background-color: #b8860b;
            color: white;
            font-weight: bold;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn-dorado:hover {
            background-color: #d4af37;
            box-shadow: 0 0 10px #b8860b;
        }

        .footer {
            font-size: 0.9rem;
            color: #999;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo"> Panadería El Dorado</div>
        <h5 class="text-center text-dark mb-3">Iniciar Sesión</h5>
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" placeholder="Ingrese su usuario">
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control" placeholder="Ingrese su contraseña">
            </div>
            <button class="btn btn-dorado w-100">Entrar</button>
        </form>
        <div class="footer">© 2025 Panadería El Dorado</div>
    </div>
</body>
</html>
