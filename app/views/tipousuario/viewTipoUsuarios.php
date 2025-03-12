<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de usuario</title>
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
        <a href="/tipoUsuario/new">Crear</a>
    </div>
    <div class="container">
        <div class="data-container">
            <?php
                if (empty($tipoUsuarios)) {
                    echo "<br>No se encuentran Tipos de Usuarios en la base de datos";
                } else {
                    foreach ($tipoUsuarios as $key => $value) {
                        echo "<div class='record'>
                            <span>ID: $value->id - $value->nombre</span>
                            <div class='buttons'>
                                <a href='/tipoUsuario/view/$value->id'>Consultar</a>
                                <a href='/tipoUsuario/edit/$value->id'>Editar</a>
                                <a href='/tipoUsuario/delete/$value->id'>Eliminar</a>
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