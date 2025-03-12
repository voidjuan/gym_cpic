<?php
namespace App\Controllers;
use App\Models\GrupoModel;
use App\Models\ProgramaModel;
require_once "baseController.php";
require_once MAIN_APP_ROUTE."../models/GrupoModel.php";
require_once MAIN_APP_ROUTE."../models/ProgramaModel.php";

class GrupoController extends BaseController {
    public function index(){
        echo "<br>CONTROLLER> GrupoController";
        echo "<br>ACTION> index";
    }

    public function view(){
        // echo "<br>CONTROLLER> ActividadController";
        // echo "<br>ACTION> view";
        // Llamamos al modelo de Rol
        $grupoObj = new GrupoModel();
        $grupos = $grupoObj->getAll();
        $data = ["grupo"=>$grupos];
        // Llamamos a la vista
        $this->render('grupos/viewGrupos.php',$data);
    }

    public function newGrupo(){
        $grupoObj = new GrupoModel();
        $grupos = $grupoObj->getAll();
        $data = ["grupo"=>$grupos];
        $this->render('grupos/newGrupo.php', $data);
    }

    public function createGrupo(){
        if (isset($_POST['txtFicha'], $_POST['txtCantAprendices'], $_POST['txtEstado'], $_POST['txtFechaIni'], $_POST['txtFechaFin'], $_POST['txtIdPrograma'])) {
            $ficha = $_POST['txtFicha'] ?? null;
            $cantAprendices = $_POST['txtCantAprendices'] ?? null;
            $estado = $_POST['txtEstado'] ?? null;
            $fechaInici = $_POST['txtFechaIni'] ?? null;
            $fechaFin = $_POST['txtFechaFin'] ?? null;
            $idPrograma = $_POST['txtIdPrograma'] ?? null;
            // Creamos instacia del modelo Rol
            $grupoObj = new GrupoModel();
            $grupoObj->saveGrupo($ficha, $cantAprendices, $estado, $fechaInici, $fechaFin, $idPrograma);
            $this->redirecTo("grupos/view");
        } else {
            echo "No se capturo el nombre";
        }
    }

    public function viewGrupo($id)
    {
        $grupoObj = new GrupoModel();
        $grupoInfo = $grupoObj->getGrupo($id);
        $data = [
            'grupo' => $grupoInfo
        ];
        $this->render('grupos/viewOneGrupo.php', $data);
    }

    public function editGrupo($id)
    {
        $grupoObj = new GrupoModel();
        $grupoInfo = $grupoObj->getGrupo($id);
        // echo "<pre>";
        // print_r($programaInfo);

        // $programaInfo = [];
        $programaObj = new ProgramaModel();
        $programasInfo = $programaObj->getAll();
        $data = [
            'grupo' => $grupoInfo,
            'programa' => $programasInfo
        ];
        // echo "<pre>";
        // print_r($centrosInfo);
        //$this->render('programas/editPrograma.php');
        $this->render('grupos/editGrupos.php', $data);
    }

    public function updateGrupo()
    {
        if (isset($_POST['txtId']) && isset($_POST['txtFicha']) && isset($_POST['txtCantAprendices']) && isset($_POST['txtEstado']) && isset($_POST['txtFechaIni']) && isset($_POST['txtFechaFin']) && isset($_POST['txtIdPrograma'])) {
            $id = $_POST['txtId'] ?? null;
            $ficha = $_POST['txtFicha'] ?? null;
            $cantAprendices = $_POST['txtCantAprendices'] ?? null;
            $estado = $_POST['txtEstado'] ?? null;
            $fechaInici = $_POST['txtFechaIni'] ?? null;
            $fechaFin = $_POST['txtFechaFin'] ?? null;
            $fkIdPrograma = $_POST['txtIdPrograma'] ?? null;
            $grupoObj = new GrupoModel();
            $respuesta = $grupoObj->editGrupo($id, $ficha, $cantAprendices, $estado, $fechaInici, $fechaFin, $fkIdPrograma);
        }
        header("location: /grupo/view");
    }

    public function deleteGrupo($id) {
        $grupoObj = new GrupoModel();
        $grupoObj->deleteGrupo($id);
        $this->redirecTo("grupo/view");
    }
}