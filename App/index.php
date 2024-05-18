<!doctype html>
<html lang="en">
    <head>
        <title>Menú Principal</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="styles1.css">
    </head>

    <body>
    <?php
// Conexión a la base de datos PostgreSQL
$host = "localhost";
$port = "5432";
$dbname = "goodreads";
$user = "postgres";
$password = "5102";

try {
    $db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
}

// Consulta para obtener los usuarios registrados
$query = "SELECT username FROM Users";
$statement = $db->prepare($query);
$statement->execute();
$usuarios = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <div class="container">
        <h1>Bienvenido</h1>
        <p>¿En qué puedo ayudarte hoy?</p>
        <div>
        <button onclick="location.href='FichasBibliograficas.php';">Fichas Bibliográficas</button>
            <button onclick="location.href='AgregarLibros.php';">Agregar Libro</button>
            <button onclick="location.href='EditarLibro.php';">Editar Libro</button>
            <button onclick="location.href='EliminarLibro.php';">Eliminar Libro</button>
            <button onclick="location.href='AgregarAutor.php';">Agregar Autor</button>
            <button onclick="location.href='EditarAutor.php';">Editar Autor</button>
            <button onclick="location.href='EliminarAutor.php';">Eliminar Autor</button>
        </div>
    </div>
</body>
</html>

        <main></main>
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
        document.getElementById("userForm").addEventListener("submit", function(event) {
            var selectedUserId = document.getElementById("usuario").value;
            document.getElementById("userForm").action = "otroformulario.php?id=" + selectedUserId; // Aquí se agrega el ID como parámetro en la URL
        });
    </script>
    </body>
</html>
