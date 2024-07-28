<?php
session_start();

// Obtener datos del paquete que se desea agregar (simulado)
$paquete = array(
    "ciudad" => "Santiago",
    "vuelo_hotel" => "Hotel W, 3 estrellas",
    "desayuno_incluido" => true,
    "precio_clp" => 250000
);

// Agregar el paquete al carrito (en este caso, simplemente lo almacenamos en un arreglo en la sesión)
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Agregar el paquete al arreglo del carrito
$_SESSION['carrito'][] = $paquete;

// Redirigir de vuelta al index o a donde sea necesario
header("Location: index.php");
exit();
?>
