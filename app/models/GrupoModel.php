<?php
namespace App\Models;

use DateTime;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class GrupoModel extends BaseModel {
    public function __construct(
        ?int $id = null,
        ?string $ficha = null,
        ?int $cantAprendices = null,
        ?string $estado = null,
        ?DateTime $fechaInicioLectiva = null,
        ?DateTime $fechaFinLectiva = null,
        ?int $fkIdPorgrama = null,

    )
    {
        $this->tabla = "grupo";
        // Se llama al constructor del padre
        parent::__construct();
    }

    public function saveGrupo($fic, $cantApren, $est, $fechaIni, $fechaFin, $idProgra) {
        try {
            $sql = "INSERT INTO $this->tabla (ficha, cantAprendices, estado, fechaIniLectiva, fechaFinLectiva, fkIdProgForm) VALUES (:ficha, :cantAprendices, :estado, :fechaIniLectiva, :fechaFinLectiva, :fkIdProgForm)";
            // 1. Se prepara la consulta
            $statement = $this->dbConnection->prepare($sql);
            // 2. bindParam para sanitizar los datso de entrada
            $statement->bindParam(":ficha", $fic, PDO::PARAM_STR);
            $statement->bindParam(":cantAprendices", $cantApren, PDO::PARAM_INT);
            $statement->bindParam(":estado", $est, PDO::PARAM_STR);
            $statement->bindParam(":fechaIniLectiva", $fechaIni);
            $statement->bindParam(":fechaFinLectiva", $fechaFin);
            $statement->bindParam(":fkIdProgForm", $idProgra, PDO::PARAM_INT);
            // 3. Ejecutamos la consulta
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar el Grupo ". $ex->getMessage();
        }
    }

    public function getGrupo($id){
        try {
            $sql = "SELECT grupo.*,programaformacion.nombre AS nombrePrograma
            FROM grupo INNER JOIN porgramaformacion
            ON grupo.fkIdProgForm = programaformacion.id
            WHERE grupo.id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener el Grupo" . $ex->getMessage();
        }
    }

    public function editGrupo($id, $ficha, $cantAprendices, $estado, $fechaInicio, $fechaFin, $fkIdPrograma) {
        try {
            $sql = "UPDATE $this->tabla SET ficha=:ficha, cantAprendices=:cantApren, estado=:estado, fechaIniLectiva=:fechaini, fechaFinLectiva=:fechaFin, fkIdProgForm=:fkIdProg WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":ficha", $ficha, PDO::PARAM_STR);
            $statement->bindParam(":cantApre", $cantAprendices, PDO::PARAM_INT);
            $statement->bindParam(":estado", $estado, PDO::PARAM_STR);
            $statement->bindParam(":fechaIni", $fechaInicio);
            $statement->bindParam(":fechaFin", $fechaFin);
            $statement->bindParam(":fkIdProg", $fkIdPrograma, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar el Grupo".$ex->getMessage();
        }
    }

    public function deleteGrupo($id){
        try {
            $sql = "DELETE FROM $this->tabla WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el rol".$ex->getMessage();
        }
    }
}