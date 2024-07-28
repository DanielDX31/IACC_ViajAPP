<?php
// Incluye la definición de la clase Filtro
require_once('Filtro.php');

// Verifica si se ha enviado el formulario
if (isset($_POST['submit'])) {
    // Obtiene los datos del formulario
    $ciudad = $_POST['ciudad'];
    $fecha = $_POST['fecha'];

    // Crear objeto de la clase Filtro y realizar la búsqueda
    $filtro = new Filtro("Hotel A", "Santiago", "Chile", "2024-07-15", "5 días");

    // Ejemplo de búsqueda
    $resultadoBusqueda = $filtro->buscarViaje($ciudad, $fecha);

    // Mostrar resultados
    if ($resultadoBusqueda) {
        echo "<p>Se encontró un viaje que coincide con los criterios de búsqueda.</p>";
    } else {
        echo "<p>No se encontraron viajes que coincidan con los criterios de búsqueda.</p>";
    }
}
?>
