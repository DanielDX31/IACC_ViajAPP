<?php
$servername = "localhost";
$username = "root";
$password = "";  
$database = "registro_usuarios";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);


$sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php?mensaje=registro_exitoso");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
