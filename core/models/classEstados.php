<?php
class Estados {

    private $db;
    private $EstadoID;
    private $Pais;
    private $Estado;    
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
            if(empty($_POST['Pais']) || empty($_POST['Estado']) ) {

                throw new Exception(1);
            } else {
                $this->Pais         = $_POST['Pais'];                
                $this->Estado         = $_POST['Estado'];                
                $this->updated_at   = date('Y-m-d',time());
                $this->created_at   = date('Y-m-d',time());
            }

        } catch(Exception $error) {
            header('location: '. $url . $error->getMessage());
            exit;
        }
    }

    public function Add() {
        $this->Errores('?view=homepage&module=estados&mode=add&error=');
        
        $sql = 'INSERT INTO estados (Pais, Estado, updated_at, created_at) '.
        ' VALUES (:Pais, :Estado, :updated_at, :created_at)';


        $stmt = $this->db->dbc->prepare($sql);

        $stmt->bindParam(":Pais",       $this->Pais,        PDO::PARAM_STR);
        $stmt->bindParam(":Estado",     $this->Estado,      PDO::PARAM_STR);
        $stmt->bindParam(":updated_at", $this->updated_at,  PDO::PARAM_STR);
        $stmt->bindParam(":created_at", $this->created_at,  PDO::PARAM_STR);
        $stmt->execute();
        $stmt = null;

        header('location: ?view=homepage&module=estados&mode=add&success=true');
    }

    public function Edit() {
        $this->EstadoID = intval($_GET['EstadoID']);
        $this->Errores('?view=homepage&module=propiedades&mode=edit&EstadoID='. $this->EstadoID .'&error=');
        
        $stmt = $this->db->dbc->prepare('UPDATE estados SET 
                                    Pais   = :Pais,
                                    Estado = :Estado,
                                    updated_at = :updated_at WHERE (EstadoID = :EstadoID)');

        $stmt->bindParam(":Pais",       $this->Pais,        PDO::PARAM_INT);
        $stmt->bindParam(":Estado",     $this->Estado,      PDO::PARAM_INT);
        $stmt->bindParam(":updated_at", $this->updated_at,  PDO::PARAM_INT);
        $stmt->bindParam(":EstadoID",   $this->EstadoID ,   PDO::PARAM_INT);
        $stmt->execute();
        $stmt = null;

        header('location: ?view=homepage&module=Estados&mode=edit&EstadoID='. $this->EstadoID .'&success=true');
    }

    public function Delete() {
        $this->EstadoID = intval($_GET['EstadoID']);
        $stmt = $this->db->dbc->prepare("DELETE FROM estados WHERE (EstadosID = :EstadosID)");
        $stmt->bindParam(":EstadosID", $this->EstadosID , PDO::PARAM_INT);
        $stmt->execute();
        $stmt = null;
        header('location: ?view=homepage&module=paises');
    }
    
    public function Show() {
        $sql = "SELECT  es.EstadoID, pa.Pais, Estado, es.updated_at, es.created_at
                FROM estados as es
                JOIN paises as pa ON  es.Pais = pa.PaisID
                ORDER BY EstadoID ASC";

        $stmt = $this->db->dbc->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();
    }

    public function getEstado(){
        $this->EstadoID = intval($_GET['EstadoID']);
        $sql = "SELECT * FROM Estados WHERE EstadoID = " . $this->EstadoID;
        $stmt = $this->db->dbc->prepare($sql);
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
}
?>