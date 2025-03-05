<?php
namespace App\Models;
use PDO;
use PDOException;

abstract class BaseModel {
    protected $dbConnection;
    protected $tabla;

    public function __construct()
    {
        try {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            $dsn = DRIVER.':host='.HOST.';dbname='.DATABASE;
            $this->dbConnection = new PDO($dsn, USERNAME_DB, PASSWORD_DB, $options);
        } catch (PDOException $ex) {
            echo "Error>".$ex->getMessage();
        }
        
    }

    public function getAll():array
    {
        try {
            $sql = "SELECT * FROM $this->tabla";
            $statement = $this->dbConnection->query($sql);
            // Obtenemos resultados de la BD en un array asociativo
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            // Devolvemos el array con los datos
            return $result;
        } catch (PDOException $ex) {
            echo "ERROR> " . $ex->getMessage();
            return [];
        }
        
    }
}