<?php
class Ciudades {

    private $db;
    private $CiudadID;
    private $Estado;
    private $Ciudad;
    private $updated_at;
    private $created_at;

    public function __construct() {
        $this->db = new Conexion();
    }

    public function __destruct() {
        $this->db = null;
    }

    private function Errores($url) {
        try {
            if(empty($_POST['Estado']) || empty($_POST['Ciudad']) ) {
                throw new Exception(1);
            } else {              
                $this->Estado       = $_POST['Estado'];                
                $this->Ciudad       = $_POST['Ciudad'];                
                $this->updated_at   = date('Y-m-d', time());
                $this->created_at   = date('Y-m-d', time());
            }

        } catch(Exception $error) {
            header('location: '. $url . $error->getMessage());
            exit;
        }
    }

    public function Add() {
        $this->Errores('?view=homepage&module=ciudades&mode=add&error=');
        
        $sql = 'INSERT INTO ciudades (Estado, Ciudad, updated_at, created_at) '.
        ' VALUES (:Estado, :Ciudad, :updated_at, :created_at)';


        $stmt = $this->db->dbc->prepare($sql);

        $stmt->bindParam(":Estado",     $this->Estado,      PDO::PARAM_STR);
        $stmt->bindParam(":Ciudad",     $this->Ciudad,      PDO::PARAM_STR);
        $stmt->bindParam(":updated_at", $this->updated_at,  PDO::PARAM_STR);
        $stmt->bindParam(":created_at", $this->created_at,  PDO::PARAM_STR);
        $stmt->execute();
        $stmt = null;

        header('location: ?view=homepage&module=ciudades&mode=add&success=true');
    }

    public function Edit() {
        $this->CiudadID = intval($_GET['CiudadID']);
        $this->Errores('?view=homepage&module=ciudades&mode=edit&EstadoID='. $this->CiudadID .'&error=');
        
        $stmt = $this->db->dbc->prepare('UPDATE ciudades SET
                                    Estado = :Estado,
                                    Ciudad = :Ciudad,
                                    updated_at = :updated_at WHERE (CiudadID = :CiudadID)');

        $stmt->bindParam(":Estado",     $this->Estado,      PDO::PARAM_INT);
        $stmt->bindParam(":Ciudad",     $this->Ciudad,      PDO::PARAM_INT);
        $stmt->bindParam(":updated_at", $this->updated_at,  PDO::PARAM_INT);
        $stmt->bindParam(":CiudadID",   $this->CiudadID ,   PDO::PARAM_INT);
        $stmt->execute();
        $stmt = null;

        header('location: ?view=homepage&module=ciudades&mode=edit&CiudadID='. $this->CiudadID .'&success=true');
    }

    public function Delete() {
        $this->CiudadID = intval($_GET['CiudadID']);
        $stmt = $this->db->dbc->prepare("DELETE FROM ciudades WHERE (CiudadID = :CiudadID)");
        $stmt->bindParam(":CiudadID", $this->CiudadID , PDO::PARAM_INT);
        $stmt->execute();
        $stmt = null;
        header('location: ?view=homepage&module=ciudades');
    }
    
    public function Show() {
        $sql = "SELECT ciu.CiudadID, pai.Pais, est.Estado, ciu.Ciudad, ciu.updated_at, ciu.created_at
        FROM ciudades ciu
        JOIN estados est ON est.EstadoID = ciu.Estado
        JOIN paises pai ON pai.PaisID = est.Pais ORDER BY CiudadID ASC";

        $stmt = $this->db->dbc->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();
    }

    public function getCiudad(){
        $this->CiudadID = intval($_GET['CiudadID']);
        $sql = "SELECT * FROM Ciudades WHERE CiudadID = :CiudadID";      
        
        $stmt = $this->db->dbc->prepare($sql);
        $stmt->bindParam(":CiudadID", $this->CiudadID , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();
    }

    public function Paises(){
        $sql = "SELECT * FROM Paises";
        $stmt = $this->db->dbc->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();
    }

    public function Estados(){
        $sql = "SELECT * FROM Estados";
        $stmt = $this->db->dbc->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();
    }
}
?>