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
            <form action="/programaFormacion/update" method="post">
                <div class="form-group">
                    <label for="txtId">Id del Programa</label>
                    <input type="text" readonly value="<?php echo $programa->id ?>" name="txtId" id="txtId" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txtCodigo">Codigo del Programa</label>
                    <input type="text" value="<?php echo $programa->codigo ?>" name="txtCodigo" id="txtCodigo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txtNombre">Nombre del programa</label>
                    <input type="text" value="<?php echo $programa->nombre ?>" name="txtNombre" id="txtNombre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txtIdCentro">ID del Centro</label>
                    <select name="txtIdCentro" id="txtIdCentro">
                    <option value=''>Selecciona un centro de formación</option>
                        <?php
                            if (isset($centros) && is_array($centros)) {
                                foreach ($centros as $key => $value) {
                                    if ($programa->FkIdCentroFormacion == $value->id) {
                                        echo "<option value=".$value->id." selected>".$value->nombre."</option>";
                                    }
                                    echo "<option value=".$value->id.">".$value->nombre."</option>";
                                }
                            } else {
                                echo "ERROR";
                            }
                            ?>
                    </select>
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