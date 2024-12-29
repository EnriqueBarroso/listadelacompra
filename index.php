<?php
include('db.php');

// Consultar productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de la Compra</title>
    <!-- Incluir Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Lista de la Compra</h1>

        <!-- Mostrar productos -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['cantidad']; ?></td>
                    <td><?php echo $row['creado_en']; ?></td>
                    <td>
                        <a href="eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        <a href="actualizar.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Formulario para agregar productos -->
        <h2 class="mt-4">Añadir Producto</h2>
        <form action="agregar.php" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Añadir</button>
        </form>
    </div>

    <!-- Incluir Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    const deleteButtons = document.querySelectorAll('.btn-danger');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            if (!confirm('¿Estás seguro de que quieres eliminar este producto?')) {
                event.preventDefault();  // Detiene la acción si el usuario cancela
            }
        });
    });
</script>

</body>
</html>

<?php if (isset($mensaje)): ?>
    <div class="alert alert-success mt-3">
        <?php echo $mensaje; ?>
    </div>
<?php endif; ?>


<?php $conn->close(); ?>
