<?php
include('db.php');

// Verificar si se ha proporcionado el ID del producto
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el producto de la base de datos
    $sql = "DELETE FROM productos WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Producto eliminado con éxito";
        header("Location: index.php"); // Redirigir al index después de eliminar
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
