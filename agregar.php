<?php
include('db.php');

// Verificar si se han enviado datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];

    // Insertar el producto en la base de datos
    $sql = "INSERT INTO productos (nombre, cantidad) VALUES ('$nombre', '$cantidad')";

    if ($conn->query($sql) === TRUE) {
        echo "Producto añadido con éxito";
        header("Location: index.php"); // Redirigir al index después de añadir
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
