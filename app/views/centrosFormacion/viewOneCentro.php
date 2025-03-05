<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centros</title>
    <link rel="stylesheet" href="/css/styles.css">
<body>
    <header>
        <h1>CPICGym - software gestion gimnasio CPIC</h1>
    </header>
    <div class="btn-ver">
        <a href="/centroFormacion/view">Atras</a>
    </div>
    <div class="container">
        <div class="data-container">
            <?php
                if($centro && is_object($centro)) {
                    // echo "<pre>";
                    // print_r($rol);
                    // echo "</pre>";
                    echo "<div class='record'>
                            <span>ID: $centro->id -</span>
                            <span>Nombre: $centro->nombre</span>
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