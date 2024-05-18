<?php
// Conexión a la base de datos
$conexion = pg_connect("host=localhost dbname=goodreads user=postgres password=5102");

// Verificar conexión
if (!$conexion) {
    die("Error en la conexión a la base de datos.");
}

// Obtener el autor seleccionado
$selectedAuthor = $_GET['autor'];

// Consulta para obtener las fichas bibliográficas del autor seleccionado
$query = "SELECT * FROM VW_FichaBibliografica WHERE \"Autor\" = '" . pg_escape_string($selectedAuthor) . "' ORDER BY id ASC";
$result = pg_query($conexion, $query);

// Construir las filas de la tabla con los datos obtenidos
$tableRows = '';
while ($row = pg_fetch_assoc($result)) {
    $tableRows .= "<tr>";
    $tableRows .= "<td>" . $row['id'] . "</td>";
    $tableRows .= "<td>" . $row['Título'] . "</td>";
    $tableRows .= "<td>" . $row['Año de publicación'] . "</td>";
    $tableRows .= "<td>" . $row['Editorial'] . "</td>";
    $tableRows .= "<td>" . $row['Autor'] . "</td>";
    $tableRows .= "</tr>";
}

// Liberar el resultado
pg_free_result($result);

// Cerrar la conexión
pg_close($conexion);

// Devolver las filas de la tabla
echo $tableRows;
?>
