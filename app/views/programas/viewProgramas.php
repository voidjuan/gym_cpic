<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programas Formacion</title>
    <link rel="stylesheet" href="/css/styles.css">
    <style>
        .btn-crear{
            width: 60px;
            position: relative;
            bottom: -20px;
            right: -40px;
            a{
                cursor: pointer;
                padding: .1rem .5rem;
                background: #000;
                color: #fff;
                border-bottom: none;
                text-decoration: none;
                border-radius: .3rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>CPICGym - software gestion gimnasio CPIC</h1>
    </header>
    <div class="btn-crear">
        <a href="/programaFormacion/new">Crear</a>
    </div>
    <div class="container">
        <div class="data-container">
            <?php
                if (empty($programas)) {
                    echo "<br>No se encuentran Actividades en la base de datos";
                } else {
                    foreach ($programas as $key => $value) {
                        echo "<div class='record'>
                            <span>ID: $value->id - $value->codigo - $value->nombre - $value->FkIdCentroFormacion</span>
                            <div class='buttons'>
                                <a href='/programaFormacion/view/$value->id'>Consultar</a>
                                <a href='/programaFormacion/edit/$value->id'>Editar</a>
                                <a href='/programaFormacion/delete/$value->id'>Eliminar</a>
                            </div>
                        </div>";
                    }
                }
            ?>
        </div>
    </div>
    <footer>
        <p>Desarrollado por ADSO 2873711</p>
    </footer>
</body>
</html>