<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programas</title>
    <link rel="stylesheet" href="/css/styles.css">
<body>
    <header>
        <h1>CPICGym - software gestion gimnasio CPIC</h1>
    </header>
    <div class="btn-ver">
        <a href="/programaFormacion/view">Atras</a>
    </div>
    <div class="container">
        <div class="data-container">
            <?php
                if($programa && is_object($programa)) {
                    // echo "<pre>";
                    // print_r($actividad);
                    // echo "</pre>";
                    echo "<div class='record'>
                            <span>ID: $programa->id </span>
                            <span>Codigo: $programa->codigo </span>
                            <span>Nombre: $programa->nombre</span>
                            <span>ID del centro: $programa->nombreCentro</span>
                        </div>";
                }
            ?>
        </div>
    </div>
    <footer>
        <p>Desarrollado por ADSO 2873711</p>
    </footer>
</body>
</html>