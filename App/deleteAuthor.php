<?php
// Establecer la conexión a la base de datos (adaptar los valores según tu configuración)
$conn = pg_connect("host=localhost dbname=goodreads user=postgres password=5102");
// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . pg_last_error());
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $authorId = $_POST["id"];

    // Llamar al procedimiento almacenado para eliminar el autor
    $sql = "SELECT SP_DeleteAuthor($authorId)";
    
    $result = pg_query($conn, $sql);
    if ($result) {
        echo "Autor eliminado exitosamente.";
    } else {
        // Si falla, verifica si es debido a la restricción de clave externa
        $error = pg_last_error($conn);
        if (strpos($error, 'violates foreign key constraint') !== false) {
            echo "Error: Este autor no puede ser eliminado porque hay libros asociados a él.";
        } else {
            echo "Error al eliminar el autor: " . $error;
        }
    }
}

// Cerrar la conexión
pg_close($conn);
?>
