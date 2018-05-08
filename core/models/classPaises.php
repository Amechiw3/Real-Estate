<?php
class Paises {

    private $db;
    private $PaisID;
    private $Pais;
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
            if(empty($_POST['Pais'])) {

                throw new Exception(1);
            } else {
                $this->Pais            = $_POST['Pais'];                
                $this->updated_at = date('Y-m-d',time());
                $this->created_at = date('Y-m-d',time());
            }

        } catch(Exception $error) {
            header('location: '. $url . $error->getMessage());
            exit;
        }
    }

    public function Add() {
        $this->Errores('?view=homepage&module=paises&mode=add&error=');
        
        $sql = 'INSERT INTO paises (Pais, updated_at, created_at) '.
        ' VALUES (:Pais, :updated_at, :created_at)';


        $stmt = $this->db->dbc->prepare($sql);

        $stmt->bindParam(":Pais",       $this->Pais,        PDO::PARAM_STR);
        $stmt->bindParam(":updated_at", $this->updated_at,  PDO::PARAM_STR);
        $stmt->bindParam(":created_at", $this->created_at,  PDO::PARAM_STR);
        $stmt->execute();
        $stmt = null;

        header('location: ?view=homepage&module=paises&mode=add&success=true');
    }

    public function Edit() {
        $this->PaisID = intval($_GET['PaisID']);
        $this->Errores('?view=homepage&module=paises&mode=edit&PaisID='. $this->PaisID .'&error=');
        
        $stmt = $this->db->dbc->prepare('UPDATE paises SET 
                                    Pais    = :Pais, 
                                    updated_at = :updated_at WHERE (PaisID = :PaisID)');

        $stmt->bindParam(":Pais",       $this->Pais,        PDO::PARAM_INT);
        $stmt->bindParam(":updated_at", $this->updated_at,  PDO::PARAM_INT);
        $stmt->bindParam(":PaisID",     $this->PaisID ,     PDO::PARAM_INT);
        $stmt->execute();
        $stmt = null;

        header('location: ?view=homepage&module=paises&mode=edit&PaisID='. $this->PaisID .'&success=true');
    }

    public function Delete() {
        $this->PaisID = intval($_GET['PaisID']);
        $stmt = $this->db->dbc->prepare("DELETE FROM paises WHERE (PaisID = :PaisID)");
        $stmt->bindParam(":PaisID", $this->PaisID , PDO::PARAM_INT);
        $stmt->execute();
        $stmt = null;
        header('location: ?view=homepage&module=paises');
    }
    
    public function Show() {
        $sql = "SELECT * FROM paises ORDER BY PaisID";

        $stmt = $this->db->dbc->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();
    }

    public function getPais(){
        $this->PaisID = intval($_GET['PaisID']);
        $sql = "SELECT * FROM paises WHERE PaisID = " . $this->PaisID;
        $stmt = $this->db->dbc->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();
    }
}
?>