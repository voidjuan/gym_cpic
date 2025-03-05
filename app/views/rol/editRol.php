<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles</title>
    <link rel="stylesheet" href="/css/styles.css">
<body>
    <header>
        <h1>CPICGym - software gestion gimnasio CPIC</h1>
    </header>
    <div class="btn-ver">
        <a href="/rol/view">Atras</a>
    </div>
    <div class="container">
        <div class="data-container">
            <form action="/rol/update" method="post">
                <div class="form-group">
                    <label for="txtId">Id del rol</label>
                    <input type="text" readonly value="<?php echo $rol->id ?>" name="txtId" id="txtId" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txtNombre">Nombre del rol</label>
                    <input type="text" value="<?php echo $rol->nombre ?>" name="txtNombre" id="txtNombre" class="form-control">
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