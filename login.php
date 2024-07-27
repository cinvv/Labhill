<?php
session_start(); // Iniciar la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura de datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Conectar a la base de datos
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "your_database";

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Comprobar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Buscar usuario en la base de datos
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verificar la contraseña
        if (password_verify($password, $row['password'])) {
            // Iniciar sesión
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("Location: index.php"); // Redirigir a la página principal
        } else {
            echo "Nombre de usuario o contraseña incorrectos.";
        }
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }

    $conn->close();
}
?>
