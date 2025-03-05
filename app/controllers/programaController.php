<?php
namespace App\Controllers;
use App\Models\ProgramaModel;
use App\Models\CentroModel;
require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/ProgramaModel.php";
require_once MAIN_APP_ROUTE."../models/CentroModel.php";

class ProgramaController extends BaseController {
    public function index(){
        echo "<br>CONTROLLER> ProgramaController";
        echo "<br>ACTION> index";
    }

    public function view(){
        // echo "<br>CONTROLLER> ActividadController";
        // echo "<br>ACTION> view";
        // Llamamos al modelo de Rol
        $programaObj = new ProgramaModel();
        $programas = $programaObj->getAll();
        $data = ["programas"=>$programas];
        // Llamamos a la vista
        $this->render('programas/viewProgramas.php',$data);
    }

    public function newPrograma(){
        $centrosObj = new CentroModel();
        $centros = $centrosObj->getAll();
        $data = ["centros"=>$centros];
        $this->render('programas/newPrograma.php', $data);
    }

    public function createPrograma(){
        if (isset($_POST['txtCodigo'], $_POST['txtNombre'], $_POST['txtIdCentro'])) {
            $codigo = $_POST['txtCodigo'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $idCentro = $_POST['txtIdCentro'] ?? null;
            // Creamos instacia del modelo Rol
            $prograObj = new ProgramaModel();
            $prograObj->savePrograma($codigo, $nombre, $idCentro);
            $this->redirecTo("programaFormacion/view");
        } else {
            echo "No se capturo el nombre";
        }
    }

    public function viewPrograma($id)
    {
        $programaObj = new ProgramaModel();
        $programaInfo = $programaObj->getPrograma($id);
        $data = [
            'programa' => $programaInfo
        ];
        $this->render('programas/viewOnePrograma.php', $data);
    }

    public function editPrograma($id)
    {
        $programaObj = new ProgramaModel();
        $programaInfo = $programaObj->getPrograma($id);
        // echo "<pre>";
        // print_r($programaInfo);

        // $programaInfo = [];
        $centrosObj = new CentroModel();
        $centrosInfo = $centrosObj->getAll();
        $data = [
            'programa' => $programaInfo,
            'centros' => $centrosInfo
        ];
        // echo "<pre>";
        // print_r($centrosInfo);
        //$this->render('programas/editPrograma.php');
        $this->render('programas/editPrograma.php', $data);
    }

    public function updatePrograma()
    {
        if (isset($_POST['txtId']) && isset($_POST['txtCodigo']) && isset($_POST['txtNombre']) && isset($_POST['txtIdCentro'])) {
            $id     = $_POST['txtId'] ?? null;
            $codigo = $_POST['txtCodigo'] ?? null;
            $nombre = $_POST['txtNombre'] ?? null;
            $fkIdCentro = $_POST['txtIdCentro'] ?? null;
            $programaObj = new ProgramaModel();
            $respuesta = $programaObj->editPrograma($id, $codigo, $nombre, $fkIdCentro);
        }
        header("location: /programaFormacion/view");
    }

    public function deletePrograma($id) {
        $rolObj = new ProgramaModel();
        $rolObj->deletePrograma($id);
        $this->redirecTo("programaFormacion/view");
    }
}