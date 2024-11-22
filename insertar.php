<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo']; // carrusel o mencion
    $titulo = $_POST['titulo'] ?? null;
    $descripcion = $_POST['descripcion'] ?? null;

    // Comprobar si se ha subido una imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $carpetaDestino = "images/";
        $nombreArchivo = basename($_FILES['imagen']['name']);
        $rutaCompleta = $carpetaDestino . $nombreArchivo;

        // Mover la imagen a la carpeta destino
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaCompleta)) {
            if ($tipo === 'carrusel') {
                $stmt = $conn->prepare("INSERT INTO imagenes_carrusel (ruta, titulo) VALUES (?, ?)");
                $stmt->bind_param("ss", $rutaCompleta, $titulo);
            } elseif ($tipo === 'mencion') {
                $stmt = $conn->prepare("INSERT INTO menciones_honorables (ruta, descripcion) VALUES (?, ?)");
                $stmt->bind_param("ss", $rutaCompleta, $descripcion);
            }

            if ($stmt->execute()) {
                echo "Imagen subida correctamente.";
            } else {
                echo "Error al guardar en la base de datos: " . $stmt->error;
            }
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        echo "Error al subir la imagen.";
    }
}
?>