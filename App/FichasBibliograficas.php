<!doctype html>
<html lang="en">
<head>
    <title>Fichas Bibliográficas</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <style>
        body {
            background-color: #f5f5f5; 
        }
        header {
            text-align: center; 
            background-color: #d2b48c; 
            padding: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px; 
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .container {
            background-color: #fff; 
            padding: 20px;
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }
        footer {
            text-align: center;
            padding: 20px;
            background-color: #d2b48c; 
            margin-top: 20px; 
        }
        button {
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #d2b48c; 
            color: #fff;
            cursor: pointer;
            margin-top: 20px; 
        }
    </style>
</head>

<body>
<header>
    <?php
    $conexion = pg_connect("host=localhost dbname=goodreads user=postgres password=5102");
    if (!$conexion) {
        die("Error en la conexión a la base de datos.");
    }
    $query_autores = "SELECT DISTINCT \"Autor\" FROM VW_FichaBibliografica ORDER BY \"Autor\" ASC";
    $result_autores = pg_query($conexion, $query_autores);
    ?>
    <select id="authorSelect">
        <option value="">Seleccionar Autor</option>
        <?php
        while ($row_autor = pg_fetch_assoc($result_autores)) {
            echo "<option value='" . $row_autor['Autor'] . "'>" . $row_autor['Autor'] . "</option>";
        }
        pg_free_result($result_autores);
        pg_close($conexion);
        ?>
    </select>
    <button onclick="searchBooks()">Buscar</button>
</header>
<div class="container">
    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>Título</th>
            <th>Año de publicación</th>
            <th>Editorial</th>
            <th>Autor</th>
        </tr>
        </thead>
        <tbody id="tablaFichas">
        </tbody>
    </table>
</div>
<footer>
    <!-- place footer here -->
</footer>

<!-- Bootstrap JavaScript Libraries -->
<script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"
></script>

<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"
></script>
<script>
    function searchBooks() {
        var authorSelect = document.getElementById('authorSelect');
        var selectedAuthor = authorSelect.value;

        if (selectedAuthor !== '') {

            fetch('buscarLibros.php?autor=' + encodeURIComponent(selectedAuthor))
                .then(response => response.text())
                .then(data => {

                    document.getElementById('tablaFichas').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error al buscar libros:', error);
                });
        } else {
            alert('Por favor, selecciona un autor.');
        }
    }
</script>
</body>
</html>
