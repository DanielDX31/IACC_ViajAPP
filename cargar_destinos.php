<?php
// Incluir conexión a la base de datos y cualquier configuración necesaria

if (isset($_POST['origen'])) {
    $origen = $_POST['origen'];
    
    // Consulta SQL para obtener los destinos según el origen
    $sql = "SELECT DISTINCT destino FROM VUELO WHERE origen = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $origen);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Generar opciones de select HTML para los destinos
    $options = "<option value=''>Seleccionar Destino</option>";
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row['destino'] . "'>" . $row['destino'] . "</option>";
    }
    
    echo $options;
    
    $stmt->close();
    $conn->close();
}
?>
