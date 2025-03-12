<?php

namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE . "../models/BaseModel.php";  

class RegistroIngresoModel extends BaseModel {
    public function __construct(
        ?int $id = null,
        ?string $fechaIn = null,
        ?string $fechaOut = null,
        ?string $fkIdUserGym = null,
        ?string $fkIdActividad = null,
        ?string $fkIdTrainer = null
    ) {
        $this->tabla = "registroingreso"; // Nombre de la tabla en la base de datos
        // Se llama al constructor del padre
        parent::__construct();
    }

    public function saveRegistroIngreso($fechaIn, $fechaOut, $fkIdUserGym, $fkIdActividad, $fkIdTrainer) {
        try {
            $sql = "INSERT INTO $this->tabla (fechaIn, fechaOut, FkIdUserGym, FkIdActividad, FkIdTrainer) 
                    VALUES (:fechaIn, :fechaOut, :fkIdUserGym, :fkIdActividad, :fkIdTrainer)";
            // 1. Se prepara la consulta
            $statement = $this->dbConnection->prepare($sql);

            // 2. BindParam para sanitizar los datos de entrada
            $statement->bindParam(':fechaIn', $fechaIn, PDO::PARAM_STR);
            $statement->bindParam(':fechaOut', $fechaOut, PDO::PARAM_STR);
            $statement->bindParam(':fkIdUserGym', $fkIdUserGym, PDO::PARAM_INT);
            $statement->bindParam(':fkIdActividad', $fkIdActividad, PDO::PARAM_INT);
            $statement->bindParam(':fkIdTrainer', $fkIdTrainer, PDO::PARAM_INT);

            // 3. Ejecutar la consulta
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "Error al guardar el registro de ingreso: " . $ex->getMessage();
        }
    }

    public function getRegistroIngreso($id) {
        try {
            $sql = "SELECT registroingreso.*, 
                           usuario.nombre AS nombreUsuario, 
                           actividad.nombre AS nombreActividad, 
                           trainer.nombre AS nombreTrainer 
                    FROM registroingreso 
                    INNER JOIN usuario ON registroingreso.FkIdUserGym = usuario.id 
                    INNER JOIN actividad ON registroingreso.FkIdActividad = actividad.id 
                    INNER JOIN trainer ON registroingreso.FkIdTrainer = trainer.id 
                    WHERE registroingreso.id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0]; 
        } catch (PDOException $ex) {
            echo "Error al obtener el registro de ingreso: " . $ex->getMessage();
        }
    }

    public function editRegistroIngreso($id, $fechaIn, $fechaOut, $fkIdUserGym, $fkIdActividad, $fkIdTrainer) {
        try {
            $sql = "UPDATE $this->tabla 
                    SET fechaIn=:fechaIn, fechaOut=:fechaOut, 
                        FkIdUserGym=:fkIdUserGym, FkIdActividad=:fkIdActividad, FkIdTrainer=:fkIdTrainer 
                    WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":fechaIn", $fechaIn, PDO::PARAM_STR);
            $statement->bindParam(":fechaOut", $fechaOut, PDO::PARAM_STR);
            $statement->bindParam(":fkIdUserGym", $fkIdUserGym, PDO::PARAM_INT);
            $statement->bindParam(":fkIdActividad", $fkIdActividad, PDO::PARAM_INT);
            $statement->bindParam(":fkIdTrainer", $fkIdTrainer, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar el registro de ingreso: " . $ex->getMessage();
        }
    }

    public function deleteRegistroIngreso($id) {
        try {
            $sql = "DELETE FROM $this->tabla WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el registro de ingreso: " . $ex->getMessage();
        }
    }
}