<?php
$host = 'localhost'; // Dirección del servidor
$usuario = 'root'; // Tu usuario de MySQL
$contraseña = ''; // Contraseña de MySQL (normalmente está vacía en localhost)
$base_de_datos = 'lista_compra'; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($host, $usuario, $contraseña, $base_de_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
