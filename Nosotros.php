<?php include("template/cabecera.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Empresa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        header {
            text-align: center;
            padding: 10px;
            background-color: #f2f2f2;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #333;
        }

        nav a {
            color: white;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        section {
            margin: 20px 0;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <header>
        <h1>EL GUERO</h1>
    </header>

    <nav>
        <a href="https://www.facebook.com/profile.php?id=100054581495089">NUSTRO FACEBOOK</a>
        <a href="https://www.google.com/maps/dir/20.512768,-99.9424/20.5674469,-99.9062138/@20.5646345,-99.9161588,15.25z/data=!4m4!4m3!1m1!4e1!1m0?entry=ttu">ubicacion</a>

    </nav>

    <section id="contactanos">
        <h2>Contactanos</h2>
        <p>¡Estamos aquí para ayudarte! Puedes contactarnos a través de:</p>
        <ul>
            <li>Correo electrónico: info@tuempresa.com</li>
            <li>Teléfono: +123456789</li>
        </ul>
    </section>

    <section id="mision-vision">
        <h2>Misión y Visión</h2>
        <p><strong>Misión:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel sem vel felis egestas lobortis.</p>
        <p><strong>Visión:</strong> Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta.</p>
    </section>

    <section id="ubicacion">
        <h2>Ubicación</h2>
        <p>Nuestra empresa está ubicada en:</p>
        <address>
            123 Calle Principal, Ciudad, País
        </address>
    </section>

    <footer>
        <p>&copy; 2023 Tu Empresa. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
<?php include("template/pie.php"); ?>