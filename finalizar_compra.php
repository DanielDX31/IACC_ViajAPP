<?php
session_start();

// Limpiar el carrito
$_SESSION['carrito'] = [];

// Función para mostrar notificaciones
function mostrarNotificacion($mensaje) {
    echo "<script>
            window.onload = function() {
                alert('$mensaje');
                window.location.href = 'index.php'; // Redirigir al inicio después de la compra
            };
          </script>";
}

mostrarNotificacion("Compra finalizada. ¡Gracias por preferir ViajAPP.com!");
?>
