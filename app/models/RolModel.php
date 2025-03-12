<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class RolModel extends BaseModel {
    public function __construct(
        ?int $id = null,
        ?string $nombre = null,

    )
    {
        $this->tabla = "rol";
        // Se llama al constructor del padre
        parent::__construct();
    }

    public function saveRol($nom) {
        try {
            $sql = "INSERT INTO $this->tabla (nombre) VALUES (:nombre)";
            // 1. Se prepara la consulta
            $statement = $this->dbConnection->prepare($sql);
            // 2. bindParam para sanitizar los datso de entrada
            $statement->bindParam(":nombre", $nom, PDO::PARAM_STR);
            // 3. Ejecutamos la consulta
            $statement->execute();
        } catch (PDOException $ex) {
            echo "Error al guardar el rol ". $ex->getMessage();
        }
    }

    public function getRol($id){
        try {
            $sql = "SELECT * FROM $this->tabla WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0];
        } catch (PDOException $ex) {
            echo "Error al obtener el Rol" . $ex->getMessage();
        }
    }

    public function editRol($id, $nombre) {
        try {
            $sql = "UPDATE $this->tabla SET nombre=:nombre WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar el rol".$ex->getMessage();
        }
    }

    public function deleteRol($id){
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