<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
    <link rel="stylesheet" href="/css/styles.css">
<body>
    <header>
        <h1>CPICGym - software gestion gimnasio CPIC</h1>
    </header>
    <div class="btn-ver">
        <a href="/actividad/view">Atras</a>
    </div>
    <div class="container">
        <div class="data-container">
            <form action="/actividad/update" method="post">
                <div class="form-group">
                    <label for="txtId">Id de la Actividad</label>
                    <input type="text" readonly value="<?php echo $actividad->id ?>" name="txtId" id="txtId" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txtNombre">Nombre de la Actividad</label>
                    <input type="text" value="<?php echo $actividad->nombre ?>" name="txtNombre" id="txtNombre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txtDescripcion">Descripcion de la Actividad</label>
                    <input type="text" value="<?php echo $actividad->descripcion ?>" name="txtDescripcion" id="txtDescripcion" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit">Editar</button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <p>Desarrollado por ADSO 2873711</p>
    </footer>
</body>
</html>