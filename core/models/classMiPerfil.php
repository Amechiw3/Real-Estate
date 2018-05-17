<?php
class MiUsuario {

    private $db;
    private $UsuarioID;
    private $Usuario;
    private $Password;
    private $Tipousuario;
    private $Nombre;
    private $Appaterno;
    private $Apmaterno;
    private $Email;
    private $Telefono;
    private $Estado;
    private $intentos;
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
            if(empty($_POST['Nombre']) || empty($_POST['Appaterno']) || empty($_POST['Apmaterno'])) {
                throw new Exception(1);
            } else if(empty($_POST['Telefono']) || empty($_POST['Email'])) {
                throw new Exception(2);
            } else if (empty($_POST['Usuario'])) {
                throw new Exception(3);                                
            } else {
                $this->Nombre       = $_POST['Nombre'];               
                $this->Appaterno    = $_POST['Appaterno'];               
                $this->Apmaterno    = $_POST['Apmaterno'];               
                $this->Telefono     = $_POST['Telefono'];               
                $this->Email        = $_POST['Email'];               
                $this->Usuario      = $_POST['Usuario'];
                if(!empty($_POST['Password'])){
                    $this->Password = Encrypt($_POST['Password']);
                }              
                $this->Tipousuario  = $_POST['Tipousuario'];            
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
        $this->UsuarioID = intval($_GET['UsuarioID']);
        $this->Errores('?view=homepage&module=miperfil&mode=edit&UsuarioID='. $this->UsuarioID .'&error=');
        
        $sql = 'UPDATE usuarios SET
                Nombre 		= :Nombre,
                Appaterno   = :Appaterno,
                Apmaterno   = :Apmaterno,
                Telefono 	= :Telefono,
                Email 		= :Email,
                Usuario 	= :Usuario,
                Tipousuario = :Tipousuario ';
        if(!empty($_POST['Password'])) {
            $sql .= ',Password = :Password ';
        }
        $sql .= ',updated_at = :updated_at
                WHERE UsuarioID = :UsuarioID';

        
        $stmt = $this->db->dbc->prepare($sql);

        $stmt->bindParam(":Nombre",     $this->Nombre,      PDO::PARAM_STR);
        $stmt->bindParam(":Appaterno",  $this->Appaterno,   PDO::PARAM_STR);
        $stmt->bindParam(":Apmaterno",  $this->Apmaterno,   PDO::PARAM_STR);
        $stmt->bindParam(":Telefono",   $this->Telefono,    PDO::PARAM_STR);
        $stmt->bindParam(":Email",      $this->Email,       PDO::PARAM_STR);
        $stmt->bindParam(":Usuario",    $this->Usuario,     PDO::PARAM_STR);
        $stmt->bindParam(":Tipousuario",$this->Tipousuario, PDO::PARAM_STR);
        $stmt->bindParam(":Appaterno",  $this->Appaterno,   PDO::PARAM_STR);
        if(!empty($_POST['Password'])) {
            $stmt->bindParam(":Password", $this->Password ,  PDO::PARAM_STR);            
        }
        $stmt->bindParam(":updated_at", $this->updated_at,  PDO::PARAM_INT);
        $stmt->bindParam(":UsuarioID",  $this->UsuarioID ,  PDO::PARAM_INT);
        $stmt->execute();
        $stmt = null;
        header('location: ?view=homepage&module=miperfil');
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