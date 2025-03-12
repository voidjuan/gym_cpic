<?php
namespace App\Controllers;
use App\Models\TipoUsuarioModel;
require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/TipoUsuarioModel.php";

class TipoUsuarioController extends BaseController {
    public function index(){
        echo "<br>CONTROLLER> TipoUsuarioController";
        echo "<br>ACTION> index";
    }

    public function view(){
        // echo "<br>CONTROLLER> TipoUsuarioController";
        // echo "<br>ACTION> view";
        // Llamamos al modelo de Rol
        $tipoUsuarioObj = new TipoUsuarioModel();
        $tipoUsuarios = $tipoUsuarioObj->getAll();
        // Llamamos a la vista
        $this->render('tipousuario/viewTipoUsuarios.php', ["tipoUsuarios"=>$tipoUsuarios]);
    }

    public function newTipoUsuario(){
        $this->render('tipousuario/newTipoUsuario.php');
    }
    public function createTipoUsuario(){
        if (isset($_POST['txtNombre'])) {
            $nombre = $_POST['txtNombre'] ?? null;
            // Creamos instacia del modelo Rol
            $tipoUsuarioObj = new TipoUsuarioModel();
            $tipoUsuarioObj->saveTipoUsuario($nombre);
            $this->redirecTo("tipoUsuario/view");
        } else {
            echo "No se capturo el nombre";
        }
    }

    public function viewTipoUsuario($id)
    {
        $tipoUsuarioObj = new TipoUsuarioModel();
        $tipoUsuarioInfo = $tipoUsuarioObj->getTipoUsuario($id);
        $data = [
            'tipoUsuario' => $tipoUsuarioInfo
        ];
        $this->render('tipousuario/viewTipoUsuario.php', $data);
    }

    public function editTipoUsuario($id)
    {
        $tipoUsuarioObj = new TipoUsuarioModel();
        $tipoUsuarioInfo = $tipoUsuarioObj->getTipoUsuario($id);
        $data = [
            'tipoUsuario' => $tipoUsuarioInfo
        ];
        $this->render('tipousuario/editTipoUsuario.php', $data);
    }

    public function updateTipoUsuario()
    {
        if (isset($_POST['txtNombre'])) {
            $id     = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $tipoUsuarioObj = new TipoUsuarioModel();
            $respuesta = $tipoUsuarioObj->editTipoUsuario($id, $nombre);
        }
        header("location: /tipoUsuario/view");
    }

    public function deleteTipoUsuario($id) {
        $tipoUsuarioObj = new TipoUsuarioModel();
        $tipoUsuarioObj->deleteTipoUsuario($id);
        $this->redirecTo("tipoUsuario/view");
    }
}