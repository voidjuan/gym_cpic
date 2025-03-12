<?php
namespace App\Controllers;
use App\Models\CentroModel;
require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/CentroModel.php";

class CentroController extends BaseController {
    public function index(){
        echo "<br>CONTROLLER> CentroController";
        echo "<br>ACTION> index";
    }

    public function view(){
        // echo "<br>CONTROLLER> CentroController";
        // echo "<br>ACTION> view";
        // Llamamos al modelo de Rol
        $centroObj = new CentroModel();
        $centros = $centroObj->getAll();
        // Llamamos a la vista
        $this->render('centrosFormacion/viewCentros.php', ["centros"=>$centros]);
    }

    public function newCentro(){
        $this->render('centrosFormacion/newCentro.php');
    }
    public function createCentro(){
        if (isset($_POST['txtNombre'])) {
            $nombre = $_POST['txtNombre'] ?? null;
            // Creamos instacia del modelo Rol
            $centroObj = new CentroModel();
            $centroObj->saveCentro($nombre);
            $this->redirecTo("centroFormacion/view");
        } else {
            echo "No se capturo el nombre";
        }
    }

    public function viewCentro($id)
    {
        $centroObj = new CentroModel();
        $centroInfo = $centroObj->getCentro($id);
        $data = [
            'centro' => $centroInfo
        ];
        $this->render('centrosFormacion/viewOneCentro.php', $data);
    }

    public function editCentro($id)
    {
        $centroObj = new CentroModel();
        $centroInfo = $centroObj->getCentro($id);
        $data = [
            'centro' => $centroInfo
        ];
        $this->render('centrosFormacion/editCentro.php', $data);
    }

    public function updateCentro()
    {
        if (isset($_POST['txtNombre'])) {
            $id     = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $centroObj = new CentroModel();
            $respuesta = $centroObj->editCentro($id, $nombre);
        }
        header("location: /centroFormacion/view");
    }

    public function deleteCentro($id) {
        $centroObj = new CentroModel();
        $centroObj->deleteCentro($id);
        $this->redirecTo("centroFormacion/view");
    }
}