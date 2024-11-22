<?php
include 'db.php';

// Obtener imágenes del carrusel
$carruselQuery = "SELECT * FROM imagenes_carrusel";
$carruselResult = $conn->query($carruselQuery);
$carruselImagenes = [];

if ($carruselResult->num_rows > 0) {
    while ($row = $carruselResult->fetch_assoc()) {
        $carruselImagenes[] = $row;
    }
}

// Obtener imágenes de menciones honorables
$mencionesQuery = "SELECT * FROM menciones_honorables";
$mencionesResult = $conn->query($mencionesQuery);
$mencionesImagenes = [];

if ($mencionesResult->num_rows > 0) {
    while ($row = $mencionesResult->fetch_assoc()) {
        $mencionesImagenes[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode([
    "carrusel" => $carruselImagenes,
    "menciones" => $mencionesImagenes
]);
?>