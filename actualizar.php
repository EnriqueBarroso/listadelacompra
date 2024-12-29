<?php
include('db.php');

// Verificar si se ha recibido un ID a través de la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos del producto que se va a actualizar
    $sql = "SELECT * FROM productos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
    } else {
        echo "Producto no encontrado.";
        exit();
    }
}

// Verificar si se han enviado los nuevos datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];

    // Actualizar los datos del producto en la base de datos
    $sql = "UPDATE productos SET nombre = '$nombre', cantidad = $cantidad WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Producto actualizado con éxito";
        header("Location: index.php"); // Redirigir al index después de actualizar
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
    <!-- Incluir Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Actualizar Producto</h1>

        <?php if (isset($producto)): ?>
        <form action="actualizar.php?id=<?php echo $producto['id']; ?>" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $producto['nombre']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" value="<?php echo $producto['cantidad']; ?>" required>
            </div>

            <button type="submit" class="btn btn-warning">Actualizar</button>
        </form>
        <?php else: ?>
        <p>No se pudo cargar el producto para actualizar.</p>
        <?php endif; ?>

        <br><a href="index.php" class="btn btn-secondary">Volver a la lista de la compra</a>
    </div>

    <!-- Incluir Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

