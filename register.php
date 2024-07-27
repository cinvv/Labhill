<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura de datos del formulario
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash de la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

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

    // Insertar usuario en la base de datos
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.html"); // Redirigir a la página de inicio de sesión
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
