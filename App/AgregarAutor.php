<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de autor</title>
    <link rel="stylesheet" href="stylesAddA.css">
</head>
<body>
    <div class="container">
        <div class="left-column">
            <div class="form-container">
                <h1>Agregar autor</h1>
                <form action="addAuthor.php" method="post">
                    <label for="nombre">Autor:</label>
                    <input type="text" id="nombre" name="nombre" required>

                    <label for="idUserCrea">ID Usuario:</label>
                    <input type="text" id="idUserCrea" name="idUserCrea" required>

                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" required>

                    <div class="buttons">
                        <button type="submit">Guardar</button>
                        <button type="button" onclick="limpiar()" class="btn">Limpiar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    function limpiar() {
        document.getElementById("nombre").value = "";
        document.getElementById("idUserCrea").value = "";
        document.getElementById("fecha").value = "";
    }
</script>
</body>
</html>




