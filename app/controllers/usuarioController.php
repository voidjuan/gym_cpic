<?php
namespace App\Controllers;
use App\Models\UsuarioModel;
use App\Models\RolModel;
use App\Models\GrupoModel;
use App\Models\CentroModel;
use App\Models\TipoUsuarioModel;

require_once 'baseController.php';
require_once MAIN_APP_ROUTE."../models/UsuarioModel.php";
require_once MAIN_APP_ROUTE."../models/RolModel.php";
require_once MAIN_APP_ROUTE."../models/GrupoModel.php";
require_once MAIN_APP_ROUTE."../models/CentroModel.php";
require_once MAIN_APP_ROUTE."../models/TipoUsuarioModel.php";

class UsuarioController extends BaseController {
    public function index(){
        echo "<br>CONTROLLER> UsuarioController";
        echo "<br>ACTION> index";
        $this->redirecTo("usuario/view");
    }

    public function view() {
        $usuarioObj = new UsuarioModel();
        $usuarios = $usuarioObj->getAll();
        $data = ["usuarios" => $usuarios];
        $this->render('usuario/viewUsuario.php', $data);
    }

    public function newUsuario(){
        $rolObj = new RolModel();
        $roles = $rolObj->getAll();

        $grupoObj = new GrupoModel();
        $grupos = $grupoObj->getAll();

        $centroObj = new CentroModel();
        $centros = $centroObj->getAll();

        $tipoUsarioGymObj = new TipoUsuarioModel();
        $tipousuarios = $tipoUsarioGymObj->getAll();
        
        $data = [
            "roles" => $roles,
            "grupos" => $grupos,
            "centros" => $centros,
            "tipousuarios" => $tipousuarios
        ];
        $this->render('usuario/newUsuario.php', $data);
    }

    public function createUsuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['txtNombre'] ?? null;
            $tipoDocumento = $_POST['txtTipoDocumento'] ?? null;
            $documento = $_POST['txtDocumento'] ?? null;
            $fechaNacimiento = $_POST['txtFechaNacimiento'] ?? null;
            $email = $_POST['txtEmail'] ?? null;
            $genero = $_POST['txtGenero'] ?? null;
            $estado = $_POST['txtEstado'] ?? null;
            $telefono = $_POST['txtTelefono'] ?? null;
            $eps = $_POST['txtEps'] ?? null;
            $tipoSangre = $_POST['txtTipoSangre'] ?? null;
            $peso = $_POST['txtPeso'] ?? null;
            $estatura = $_POST['txtEstatura'] ?? null;
            $telefonoEmergencia = $_POST['txtTelefonoEmergencia'] ?? null;
            $password = $_POST['txtPassword'] ?? null;
            $observaciones = $_POST['txtObservaciones'] ?? null;
            $fkIdRol = $_POST['txtFkIdRol'] ?? null;
            $fkIdGrupo = $_POST['txtFkIdGrupo'] ?? null;
            $fkIdCentroFormacion = $_POST['txtFkIdCentroFormacion'] ?? null;
            $fkIdTipoUserGym = $_POST['txtFkIdTipoUserGym'] ?? null;

            $usuarioObj = new UsuarioModel();
            $result = $usuarioObj->saveUsuario($nombre, $tipoDocumento, $documento, $fechaNacimiento, $email, $genero, $estado, $telefono, $eps, $tipoSangre, $peso, $estatura, $telefonoEmergencia, $password, $observaciones, $fkIdRol, $fkIdGrupo, $fkIdCentroFormacion, $fkIdTipoUserGym);

            if ($result) {
                $this->redirecTo("usuario/view");
            } else {
                echo "Error al guardar el usuario";
            }
        } else {
            echo "Método no permitido";
        }
    }

    public function viewUsuario($id) {
        $usuarioObj = new UsuarioModel();
        $usuarioInfo = $usuarioObj->getusuario($id);
        $data = [
            'usuario' => $usuarioInfo
        ];
        $this->render('usuario/viewOneUsuario.php', $data);
    }

    public function editUsuario($id) {
        $usuarioObj = new UsuarioModel();
        $usuarioInfo = $usuarioObj->getusuario($id);

        $rolObj = new RolModel();
        $roles = $rolObj->getAll();

        $grupoObj = new GrupoModel();
        $grupos = $grupoObj->getAll();

        $centroObj = new CentroModel();
        $centros = $centroObj->getAll();

        $tipoUsarioGymObj = new TipoUsuarioModel();
        $tipousuarios = $tipoUsarioGymObj->getAll();

        $data = [
            "usuario" => $usuarioInfo,
            "roles" => $roles,
            "grupos" => $grupos,
            "centros" => $centros,
            "tipousuarios" => $tipousuarios
        ];
        $this->render('usuario/editUsuario.php', $data);
    }

    public function updateUsuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $tipoDocumento = $_POST['txtTipoDocumento'] ?? null;
            $documento = $_POST['txtDocumento'] ?? null;
            $fechaNacimiento = $_POST['txtFechaNacimiento'] ?? null;
            $email = $_POST['txtEmail'] ?? null;
            $genero = $_POST['txtGenero'] ?? null;
            $estado = $_POST['txtEstado'] ?? null;
            $telefono = $_POST['txtTelefono'] ?? null;
            $eps = $_POST['txtEps'] ?? null;
            $tipoSangre = $_POST['txtTipoSangre'] ?? null;
            $peso = $_POST['txtPeso'] ?? null;
            $estatura = $_POST['txtEstatura'] ?? null;
            $telefonoEmergencia = $_POST['txtTelefonoEmergencia'] ?? null;
            $password = $_POST['txtPassword'] ?? null;
            $observaciones = $_POST['txtObservaciones'] ?? null;
            $fkIdRol = $_POST['txtFkIdRol'] ?? null;
            $fkIdGrupo = $_POST['txtFkIdGrupo'] ?? null;
            $fkIdCentroFormacion = $_POST['txtFkIdCentroFormacion'] ?? null;
            $fkIdTipoUserGym = $_POST['txtFkIdTipoUserGym'] ?? null;

            $usuarioObj = new UsuarioModel();
            $result = $usuarioObj->editusuario($id, $nombre, $tipoDocumento, $documento, $fechaNacimiento, $email, $genero, $estado, $telefono, $eps, $tipoSangre, $peso, $estatura, $telefonoEmergencia, $password, $observaciones, $fkIdRol, $fkIdGrupo, $fkIdCentroFormacion, $fkIdTipoUserGym);

            if ($result) {
                $this->redirecTo("usuario/view");
            } else {
                echo "Error al actualizar el usuario";
            }
        } else {
            echo "Método no permitido";
        }
    }

    public function deleteUsuario($id) {
        $usuarioObj = new UsuarioModel();
        $result = $usuarioObj->deleteUsuario($id);
        if ($result) {
            $this->redirecTo("usuario/view");
        } else {
            echo "Error al eliminar el usuario";
        }
    }
}