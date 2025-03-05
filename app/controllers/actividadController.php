<?php
namespace App\Controllers;
use App\Models\ActividadModel;
require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/ActividadModel.php";

class ActividadController extends BaseController {
    public function index(){
        echo "<br>CONTROLLER> ActividadController";
        echo "<br>ACTION> index";
    }

    public function view(){
        // echo "<br>CONTROLLER> ActividadController";
        // echo "<br>ACTION> view";
        // Llamamos al modelo de Rol
        $actividadObj = new ActividadModel();
        $actividades = $actividadObj->getAll();
        // Llamamos a la vista
        $this->render('actividades/viewActividades.php', ["actividades"=>$actividades]);
    }

    public function newActividad(){
        $this->render('actividades/newActividad.php');
    }
    public function createActividad(){
        if (isset($_POST['txtNombre']) && isset($_POST['txtDescripcion'])) {
            $nombre = $_POST['txtNombre'] ?? null;
            $descripcion = $_POST['txtDescripcion'] ?? null;
            // Creamos instacia del modelo Rol
            $actividadObj = new ActividadModel();
            $actividadObj->saveActividad($nombre, $descripcion);
            $this->redirecTo("actividad/view");
        } else {
            echo "No se capturo el nombre";
        }
    }

    public function viewActividad($id)
    {
        $actividadObj = new ActividadModel();
        $actividadInfo = $actividadObj->getActividad($id);
        $data = [
            'actividad' => $actividadInfo
        ];
        $this->render('actividades/viewOneActividad.php', $data);
    }

    public function editActividad($id)
    {
        $actividadObj = new ActividadModel();
        $actividadInfo = $actividadObj->getActividad($id);
        $data = [
            'actividad' => $actividadInfo
        ];
        $this->render('actividades/editActividad.php', $data);
    }

    public function updateActividad()
    {
        if (isset($_POST['txtId']) && isset($_POST['txtNombre']) && isset($_POST['txtDescripcion'])) {
            $id     = $_POST['txtId'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $descripcion = $_POST['txtDescripcion'] ?? null;
            $actividadObj = new ActividadModel();
            $respuesta = $actividadObj->editActividad($id, $nombre, $descripcion);
        }
        header("location: /actividad/view");
    }

    public function deleteActividad($id) {
        $rolObj = new ActividadModel();
        $rolObj->deleteActividad($id);
        $this->redirecTo("actividad/view");
    }
}