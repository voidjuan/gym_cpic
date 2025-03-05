<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class ActividadModel extends BaseModel {
    public function __construct(
        ?int $id = null,
        ?string $nombre = null,
        ?string $descripcion = null,

    )
    {
        $this->tabla = "actividad";
        // Se llama al constructor del padre
        parent::__construct();
    }

    public function saveActividad($nom, $descr) {
        try {
            $sql = "INSERT INTO $this->tabla (nombre, descripcion) VALUES (:nombre, :descripcion)";
            // 1. Se prepara la consulta
            $statement = $this->dbConnection->prepare($sql);
            // 2. bindParam para sanitizar los datso de entrada
            $statement->bindParam(":nombre", $nom, PDO::PARAM_STR);
            $statement->bindParam(":descripcion", $descr, PDO::PARAM_STR);
            // 3. Ejecutamos la consulta
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar la actividad ". $ex->getMessage();
        }
    }

    public function getActividad($id){
        try {
            $sql = "SELECT * FROM $this->tabla WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener la actividad" . $ex->getMessage();
        }
    }

    public function editActividad($id, $nombre, $descripcion) {
        try {
            $sql = "UPDATE $this->tabla SET nombre=:nombre, descripcion=:descripcion WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar la actividad".$ex->getMessage();
        }
    }

    public function deleteActividad($id){
        try {
            $sql = "DELETE FROM $this->tabla WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo eliminar la actividad".$ex->getMessage();
        }
    }
}