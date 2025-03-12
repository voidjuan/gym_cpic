<?php
namespace App\Models;
use PDO;
use PDOException;

require_once MAIN_APP_ROUTE."../models/BaseModel.php";

class UsuarioModel extends BaseModel {
    public function __construct(
        ?int $id = null,
        ?string $nombre = null,
    ) 
    {
        $this->tabla = "usuario";
        parent::__construct();
    }

    public function validarLogin($email, $password){
        $sql = "SELECT * FROM $this->tabla WHERE email=:email";
        $statement = $this->dbConnection->prepare($sql);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $resultSet = [];
        while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
            $resultSet[] = $row;
        }
        if (count($resultSet)>0) {
            $hash = $resultSet[0]->password;
            if (password_verify($password,$hash)) {
                //La contraeña ingresada es correcta
                $_SESSION['nombre'] = $resultSet[0]->nombre;
                $_SESSION['id'] = $resultSet[0]->documento;
                $_SESSION['rol'] = $resultSet[0]->fkIdRol;
                $_SESSION['timeout'] = time();
                session_regenerate_id();
                return true;
            }
        }
        return false;
    }
    public function saveUsuario($nombre, $tipoDocumento, $documento, $fechaNacimiento, $email, $genero, $estado, $telefono, $eps, $tipoSangre, $peso, $estatura, $telefonoEmergencia, $password, $observaciones, $fkIdRol, $fkIdGrupo, $fkIdCentroFormacion, $fkIdTipoUserGym) {
        try {
            $sql = "INSERT INTO $this->tabla (nombre, tipoDocumento, documento, fechaNacimiento, email, genero, estado, telefono, eps, tipoSangre, peso, estatura, telefonoEmergencia, password, observaciones, FkIdRol, FkIdGrupo, FkIdCentroFormacion, FkIdTipoUserGym) 
                    VALUES (:nombre, :tipoDocumento, :documento, :fechaNacimiento, :email, :genero, :estado, :telefono, :eps, :tipoSangre, :peso, :estatura, :telefonoEmergencia, :password, :observaciones, :FkIdRol, :FkIdGrupo, :FkIdCentroFormacion, :FkIdTipoUserGym)";
            $statement = $this->dbConnection->prepare($sql);

            $statement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $statement->bindParam(':tipoDocumento', $tipoDocumento, PDO::PARAM_STR);
            $statement->bindParam(':documento', $documento, PDO::PARAM_STR);
            $statement->bindParam(':fechaNacimiento', $fechaNacimiento, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':genero', $genero, PDO::PARAM_STR);
            $statement->bindParam(':estado', $estado, PDO::PARAM_STR);
            $statement->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $statement->bindParam(':eps', $eps, PDO::PARAM_STR);
            $statement->bindParam(':tipoSangre', $tipoSangre, PDO::PARAM_STR);
            $statement->bindParam(':peso', $peso, PDO::PARAM_STR);
            $statement->bindParam(':estatura', $estatura, PDO::PARAM_STR);
            $statement->bindParam(':telefonoEmergencia', $telefonoEmergencia, PDO::PARAM_STR);
            $statement->bindParam(':password', $password, PDO::PARAM_STR);
            $statement->bindParam(':observaciones', $observaciones, PDO::PARAM_STR);
            $statement->bindParam(':FkIdRol', $fkIdRol, PDO::PARAM_INT);
            $statement->bindParam(':FkIdGrupo', $fkIdGrupo, PDO::PARAM_INT);
            $statement->bindParam(':FkIdCentroFormacion', $fkIdCentroFormacion, PDO::PARAM_INT);
            $statement->bindParam(':FkIdTipoUserGym', $fkIdTipoUserGym, PDO::PARAM_INT);

            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "Error al guardar el usuario: " . $ex->getMessage();
            return false;
        }
    }

    public function getUsuario($id) {
        try {
            $sql = "SELECT usuario.*, rol.nombre AS nombreRol, grupo.id AS idGrupo, centroformacion.nombre AS nombreCentro, tipousuariogym.nombre AS nombreTipoUsuarioGym 
                    FROM usuario 
                    INNER JOIN rol ON usuario.FkIdRol = rol.id 
                    INNER JOIN grupo ON usuario.FkIdGrupo = grupo.id 
                    INNER JOIN centroformacion ON usuario.FkIdCentroFormacion = centroformacion.id 
                    INNER JOIN tipousuariogym ON usuario.FkIdTipoUserGym = tipousuariogym.id 
                    WHERE usuario.id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            return $result[0]; 
        } catch (PDOException $ex) {
            echo "Error al obtener el usuario: " . $ex->getMessage();
        }
    }

    public function editUsuario($id, $nombre, $tipoDocumento, $documento, $fechaNacimiento, $email, $genero, $estado, $telefono, $eps, $tipoSangre, $peso, $estatura, $telefonoEmergencia, $password, $observaciones, $fkIdRol, $fkIdGrupo, $fkIdCentroFormacion, $fkIdTipoUserGym) {
        try {
            $sql = "UPDATE $this->tabla 
                    SET nombre=:nombre, tipoDocumento=:tipoDocumento, documento=:documento, fechaNacimiento=:fechaNacimiento, email=:email, genero=:genero, estado=:estado, telefono=:telefono, eps=:eps, tipoSangre=:tipoSangre, peso=:peso, estatura=:estatura, telefonoEmergencia=:telefonoEmergencia, password=:password, observaciones=:observaciones, FkIdRol=:FkIdRol, FkIdGrupo=:FkIdGrupo, FkIdCentroFormacion=:FkIdCentroFormacion, FkIdTipoUserGym=:FkIdTipoUserGym 
                    WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $statement->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $statement->bindParam(":tipoDocumento", $tipoDocumento, PDO::PARAM_STR);
            $statement->bindParam(":documento", $documento, PDO::PARAM_STR);
            $statement->bindParam(":fechaNacimiento", $fechaNacimiento, PDO::PARAM_STR);
            $statement->bindParam(":email", $email, PDO::PARAM_STR);
            $statement->bindParam(":genero", $genero, PDO::PARAM_STR);
            $statement->bindParam(":estado", $estado, PDO::PARAM_STR);
            $statement->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $statement->bindParam(":eps", $eps, PDO::PARAM_STR);
            $statement->bindParam(":tipoSangre", $tipoSangre, PDO::PARAM_STR);
            $statement->bindParam(":peso", $peso, PDO::PARAM_STR);
            $statement->bindParam(":estatura", $estatura, PDO::PARAM_STR);
            $statement->bindParam(":telefonoEmergencia", $telefonoEmergencia, PDO::PARAM_STR);
            $statement->bindParam(":password", $password, PDO::PARAM_STR);
            $statement->bindParam(":observaciones", $observaciones, PDO::PARAM_STR);
            $statement->bindParam(":FkIdRol", $fkIdRol, PDO::PARAM_INT);
            $statement->bindParam(":FkIdGrupo", $fkIdGrupo, PDO::PARAM_INT);
            $statement->bindParam(":FkIdCentroFormacion", $fkIdCentroFormacion, PDO::PARAM_INT);
            $statement->bindParam(":FkIdTipoUserGym", $fkIdTipoUserGym, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo editar el usuario: " . $ex->getMessage();
        }
    }

    public function deleteUsuario($id){
        try {
            $sql = "DELETE FROM $this->tabla WHERE id=:id";
            $statement = $this->dbConnection->prepare($sql);
            $statement->bindParam(":id", $id, PDO::PARAM_INT);
            $result = $statement->execute();
            return $result;
        } catch (PDOException $ex) {
            echo "No se pudo eliminar el usuario: " . $ex->getMessage();
        }
    }
}