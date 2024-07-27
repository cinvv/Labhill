<?php
session_start(); // Iniciar la sesión

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <nav>
            <ul>
                <li><a href="order.html">Realizar Pedido</a></li>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Contenido protegido</h2>
        <p>Solo los usuarios autenticados pueden ver este contenido.</p>
    </main>
</body>
</html>
