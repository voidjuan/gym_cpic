<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programas de Formacion</title>
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
            <form action="/programaFormacion/create" method="post">
                <div class="form-group">
                    <label for="txtCodigo">Codigo del Programa de Formacion: </label>
                    <input type="text" name="txtCodigo" id="txtCodigo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txtNombre">Nombre del Programa de Formacion</label>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                </div>
                <div class="form-group">
                    <label for="txtIdCentro">Id del Centro de Formacion</label>
                        <select name="txtIdCentro" id="txtIdCentro">
                            <?php
                            if (isset($centros) && is_array($centros)) {
                                foreach ($centros as $key => $value) {
                                    echo "<option value=".$value->id.">".$value->nombre."</option>";
                                }
                            } else {
                                echo "ERROR";
                            }
                            ?>
                        </select>
                </div>
                <div class="form-group">
                    <button type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <p>Desarrollado por ADSO 2873711</p>
    </footer>
</body>
</html>