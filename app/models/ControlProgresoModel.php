<?php

namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class ControlProgresoModel extends BaseModel {
    public function __construct(
        ?int $id = null,
        ?string $fechaRealizacion = null,
        ?string $peso = null,
        ?string $cintura = null,
        ?string $cadera = null,
        ?string $musloDerecho = null,
        ?string $musloIzquierdo = null,
        ?string $brazoDerecho = null,
        ?string $brazoIzquierdo = null,
        ?string $antebrazoDerecho = null,
        ?string $antebrazoIzquierdo = null,
        ?string $pantorrillaDerecha = null,
        ?string $pantorrillaIzquierda = null,
        ?string $examenMedico = null,
        ?string $observaciones = null,
        ?string $fechaExamen = null,
        ?string $fkIdUsuario = null
    ) {
        $this->tabla = "controlprogreso";
        // Se llama al constructor del padre
        parent::__construct();
    }
    public function saveControlProgreso($fechaRealizacion, $peso, $cintura, $cadera, $musloDerecho, $musloIzquierdo, $brazoDerecho, $brazoIzquierdo, $antebrazoDerecho, $antebrazoIzquierdo, $pantorrillaDerecha, $pantorrillaIzquierda, $examenMedico, $observaciones, $fechaExamen, $fkIdUsuario) {
        try {
            $sql = "INSERT INTO $this->tabla (fechaRealizacion, peso, cintura, cadera, musloDerecho, musloIzquierdo, brazoDerecho, brazoIzquierdo, antebrazoDerecho, antebrazoIzquierdo, pantorrillaDerecha, pantorrillaIzquierda, examenMedico, observaciones, fechaExamen, FkIdUsuario) VALUES (:fechaRealizacion, :peso, :cintura, :cadera, :musloDerecho, :musloIzquierdo, :brazoDerecho, :brazoIzquierdo, :antebrazoDerecho, :antebrazoIzquierdo, :pantorrillaDerecha, :pantorrillaIzquierda, :examenMedico, :observaciones, :fechaExamen, :FkIdUsuario)";
            // 1. Se prepara la consulta
            $statement = $this->dbConnection->prepare($sql);

            // 2. BindParam para sanitizar los datos de entrada
            $statement->bindParam(':fechaRealizacion', $fechaRealizacion, PDO::PARAM_STR);
            $statement->bindParam(':peso', $peso, PDO::PARAM_STR);
            $statement->bindParam(':cintura', $cintura, PDO::PARAM_STR);
            $statement->bindParam(':cadera', $cadera, PDO::PARAM_STR);
            $statement->bindParam(':musloDerecho', $musloDerecho, PDO::PARAM_STR);
            $statement->bindParam(':musloIzquierdo', $musloIzquierdo, PDO::PARAM_STR);
            $statement->bindParam(':brazoDerecho', $brazoDerecho, PDO::PARAM_STR);
            $statement->bindParam(':brazoIzquierdo', $brazoIzquierdo, PDO::PARAM_STR);
            $statement->bindParam(':antebrazoDerecho', $antebrazoDerecho, PDO::PARAM_STR);
            $statement->bindParam(':antebrazoIzquierdo', $antebrazoIzquierdo, PDO::PARAM_STR);
            $statement->bindParam(':pantorrillaDerecha', $pantorrillaDerecha, PDO::PARAM_STR);
            $statement->bindParam(':pantorrillaIzquierda', $pantorrillaIzquierda, PDO::PARAM_STR);
            $statement->bindParam(':examenMedico', $examenMedico, PDO::PARAM_STR);
            $statement->bindParam(':observaciones', $observaciones, PDO::PARAM_STR);
            $statement->bindParam(':fechaExamen', $fechaExamen, PDO::PARAM_STR);
            $statement->bindParam(':FkIdUsuario', $fkIdUsuario, PDO::PARAM_INT);

            // 3. Ejecutar la consulta
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "Error al guardar el control de progreso: " . $ex->getMessage();
        }
    }


    public function getControlProgreso($id) {
        try {
            $sql = "SELECT controlprogreso.*, usuario.nombre AS nombreUsuario 
                    FROM controlprogreso 
                    INNER JOIN usuario 
                    ON controlprogreso.fkIdUsuario = usuario.id 
                    WHERE controlprogreso.id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0]; 
        } catch (PDOException $ex) {
            echo "Error al obtener el control de progreso: " . $ex->getMessage();
        }
    }


    public function editControlProgreso($id, $fechaRealizacion, $peso, $cintura, $cadera, $musloDerecho, $musloIzquierdo, $brazoDerecho, $brazoIzquierdo, $antebrazoDerecho, $antebrazoIzquierdo, $pantorrillaDerecha, $pantorrillaIzquierda, $examenMedico, $observaciones, $fechaExamen, $fkIdUsuario) {
        try {
            $sql = "UPDATE $this->tabla SET fechaRealizacion=:fechaRealizacion, peso=:peso, cintura=:cintura, cadera=:cadera, musloDerecho=:musloDerecho, musloIzquierdo=:musloIzquierdo, brazoDerecho=:brazoDerecho, brazoIzquierdo=:brazoIzquierdo, antebrazoDerecho=:antebrazoDerecho, antebrazoIzquierdo=:antebrazoIzquierdo, pantorrillaDerecha=:pantorrillaDerecha, pantorrillaIzquierda=:pantorrillaIzquierda, examenMedico=:examenMedico, observaciones=:observaciones, fechaExamen=:fechaExamen, FkIdUsuario=:FkIdUsuario WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":fechaRealizacion", $fechaRealizacion, PDO::PARAM_STR);
            $statement->bindParam(":peso", $peso, PDO::PARAM_STR);
            $statement->bindParam(":cintura", $cintura, PDO::PARAM_STR);
            $statement->bindParam(":cadera", $cadera, PDO::PARAM_STR);
            $statement->bindParam(":musloDerecho", $musloDerecho, PDO::PARAM_STR);
            $statement->bindParam(":musloIzquierdo", $musloIzquierdo, PDO::PARAM_STR);
            $statement->bindParam(":brazoDerecho", $brazoDerecho, PDO::PARAM_STR);
            $statement->bindParam(":brazoIzquierdo", $brazoIzquierdo, PDO::PARAM_STR);
            $statement->bindParam(":antebrazoDerecho", $antebrazoDerecho, PDO::PARAM_STR);
            $statement->bindParam(":antebrazoIzquierdo", $antebrazoIzquierdo, PDO::PARAM_STR);
            $statement->bindParam(":pantorrillaDerecha", $pantorrillaDerecha, PDO::PARAM_STR);
            $statement->bindParam(":pantorrillaIzquierda", $pantorrillaIzquierda, PDO::PARAM_STR);
            $statement->bindParam(":examenMedico", $examenMedico, PDO::PARAM_STR);
            $statement->bindParam(":observaciones", $observaciones, PDO::PARAM_STR);
            $statement->bindParam(":fechaExamen", $fechaExamen, PDO::PARAM_STR);
            $statement->bindParam(":FkIdUsuario", $fkIdUsuario, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar el control de progreso: " . $ex->getMessage();
        }
    }



  

    public function deleteControlProgreso($id){
        try {
            $sql = "DELETE FROM $this->tabla WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el control de progreso: " . $ex->getMessage();
        }
    }
}

