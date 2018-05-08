<?php
class Propiedades {

    private $db;
    private $PropiedadID;
    private $PropiedadTipo;
    private $PropiedadFecha;
    private $Pais;
    private $Estado;
    private $Ciudad;
    private $CodigoPostal;
    private $Colonia;
    private $Calle;
    private $Numero;
    private $NumeroHab;
    private $Area;
    private $Precio;
    private $Imagen;
    private $InformacionAdic;
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
            if( empty($_POST['PropiedadTipo'])  || empty($_POST['PropiedadFecha']) ||
                empty($_POST['Pais'])           || empty($_POST['Estado']) ||
                empty($_POST['Ciudad'])         || empty($_POST['CodigoPostal']) ||
                empty($_POST['Colonia'])        || empty($_POST['Calle']) ||
                empty($_POST['Numero'])         || empty($_POST['NumeroHab']) ||
                empty($_POST['Area'])           || empty($_POST['Precio']) ||
                empty($_POST['imagenprop'])) {

                throw new Exception(1);
            } else {
                
                $this->PropiedadTipo   = $_POST['PropiedadTipo'];
                $this->PropiedadFecha  = $_POST['PropiedadFecha'];
                $this->Pais            = $_POST['Pais'];
                $this->Estado          = $_POST['Estado'];
                $this->Ciudad          = $_POST['Ciudad'];
                $this->CodigoPostal    = $_POST['CodigoPostal'];
                $this->Colonia         = $_POST['Colonia'];
                $this->Calle           = $_POST['Calle'];
                $this->Numero          = $_POST['Numero'];
                $this->NumeroHab       = $_POST['NumeroHab'];
                $this->Area            = $_POST['Area'];
                $this->Precio          = $_POST['Precio'];
                $this->Imagen          = $_POST['imagenprop'];
                $this->InformacionAdic = $_POST['InformacionAdic'];
                
                $this->updated_at = date('Y-m-d',time());
                $this->created_at = date('Y-m-d',time());
            }

        } catch(Exception $error) {
            header('location: '. $url . $error->getMessage());
            exit;
        }
    }

    public function Add() {
        $this->Errores('?view=homepage&module=propiedades&mode=add&error=');
        
        $sql = 'INSERT INTO propiedades (PropiedadTipo, PropiedadFecha, Pais, Estado, Ciudad, CodigoPostal, Colonia, Calle, Numero, NumeroHab, Area, Precio, Imagen, InformacionAdic, updated_at, created_at) '.
        ' VALUES (:PropiedadTipo, :PropiedadFecha, :Pais, :Estado, :Ciudad, :CodigoPostal, :Colonia, :Calle, :Numero, :NumeroHab, :Area, :Precio, :Imagen, :InformacionAdic, "'. date('Y-m-d',time()) .'", "'. date('Y-m-d',time()) .'")';

        var_dump($sql);

        $stmt = $this->db->dbc->prepare($sql);

        $stmt->bindParam(":PropiedadTipo",      $this->PropiedadTipo,   PDO::PARAM_INT);
        $stmt->bindParam(":PropiedadFecha",     $this->PropiedadFecha,  PDO::PARAM_STR);
        $stmt->bindParam(":Pais",               $this->Pais,            PDO::PARAM_INT);
        $stmt->bindParam(":Estado",             $this->Estado,          PDO::PARAM_INT);
        $stmt->bindParam(":Ciudad",             $this->Ciudad,          PDO::PARAM_INT);
        $stmt->bindParam(":CodigoPostal",       $this->CodigoPostal,    PDO::PARAM_STR);
        $stmt->bindParam(":Colonia",            $this->Colonia,         PDO::PARAM_STR);
        $stmt->bindParam(":Calle",              $this->Calle,           PDO::PARAM_STR);
        $stmt->bindParam(":Numero",             $this->Numero,          PDO::PARAM_STR);
        $stmt->bindParam(":NumeroHab",          $this->NumeroHab,       PDO::PARAM_INT);
        $stmt->bindParam(":Area",               $this->Area,            PDO::PARAM_STR);
        $stmt->bindParam(":Precio",             $this->Precio,          PDO::PARAM_STR);
        $stmt->bindParam(":Imagen",             $this->Imagen,          PDO::PARAM_STR);
        $stmt->bindParam(":InformacionAdic",    $this->InformacionAdic, PDO::PARAM_STR);
        $stmt->execute();
        $stmt = null;

        header('location: ?view=homepage&module=propiedades&mode=add&success=true');
    }

    public function Edit() {
        $this->PropiedadID = intval($_GET['PropiedadID']);
        $this->Errores('?view=homepage&module=propiedades&mode=edit&PropiedadID='. $this->PropiedadID .'&error=');
        
        $stmt = $this->db->dbc->prepare('UPDATE propiedades SET 
                                    PropiedadTipo   = :PropiedadTipo, 
                                    PropiedadFecha  = :PropiedadFecha,
                                    Pais    = :Pais, 
                                    Estado  = :Estado, 
                                    Ciudad  = :Ciudad,
                                    CodigoPostal= :CodigoPostal, 
                                    Colonia     = :Colonia, 
                                    Calle   = :Calle, 
                                    Numero  = :Numero, 
                                    NumeroHab = :NumeroHab, 
                                    Area    = :Area, 
                                    Precio  = :Precio, 
                                    Imagen  = :Imagen, 
                                    InformacionAdic = :InformacionAdic, 
                                    updated_at = :updated_at WHERE (PropiedadID = :PropiedadID)');

        $stmt->bindParam(":PropiedadTipo",      $this->PropiedadTipo,   PDO::PARAM_INT);
        $stmt->bindParam(":PropiedadFecha",     $this->PropiedadFecha,  PDO::PARAM_STR);
        $stmt->bindParam(":Pais",               $this->Pais,            PDO::PARAM_INT);
        $stmt->bindParam(":Estado",             $this->Estado,          PDO::PARAM_INT);
        $stmt->bindParam(":Ciudad",             $this->Ciudad,          PDO::PARAM_INT);
        $stmt->bindParam(":CodigoPostal",       $this->CodigoPostal,    PDO::PARAM_INT);
        $stmt->bindParam(":Colonia",            $this->Colonia,         PDO::PARAM_STR);
        $stmt->bindParam(":Calle",              $this->Calle,           PDO::PARAM_STR);
        $stmt->bindParam(":Numero",             $this->Numero,          PDO::PARAM_STR);
        $stmt->bindParam(":NumeroHab",          $this->NumeroHab,       PDO::PARAM_INT);
        $stmt->bindParam(":Area",               $this->Area,            PDO::PARAM_STR);
        $stmt->bindParam(":Precio",             $this->Precio,          PDO::PARAM_STR);
        $stmt->bindParam(":Imagen",             $this->Imagen,          PDO::PARAM_STR);
        $stmt->bindParam(":InformacionAdic",    $this->InformacionAdic, PDO::PARAM_STR);
        $stmt->bindParam(":updated_at",         $this->updated_at,      PDO::PARAM_STR);
        $stmt->bindParam(":PropiedadID",        $this->PropiedadID ,    PDO::PARAM_INT);
        $stmt->execute();
        $stmt = null;

        header('location: ?view=homepage&module=propiedades&mode=edit&PropiedadID='. $this->PropiedadID .'&success=true');
    }

    public function Delete() {
        $this->PropiedadID = intval($_GET['PropiedadID']);
        $stmt = $this->db->dbc->prepare("DELETE FROM propiedades WHERE (PropiedadID = :PropiedadID)");
        $stmt->bindParam(":PropiedadID", $this->PropiedadID , PDO::PARAM_INT);
        $stmt->execute();
        $stmt = null;
        header('location: ?view=homepage&module=propiedades');
    }
    
    public function Show() {
        $sql = "SELECT ps.PropiedadID, tipospropiedades.Nombre,
        ps.PropiedadFecha, CONCAT(estados.Estado,', ', ciudades.Ciudad)as ubicacion,
        CONCAT(ps.Calle,' ', ps.Numero,', ', ps.Colonia,', ',
        ps.CodigoPostal,' ', ciudades.Ciudad,', ',
        SUBSTR(estados.Estado, 1, 3))as direccion,
        ps.NumeroHab, ps.Area, ps.Precio, Format(ps.Precio, 2)as precios,
        ps.Imagen, ps.InformacionAdic,
        ps.updated_at, ps.created_at from propiedades as ps
        join tipospropiedades on PropiedadTipo = TipoPropiedadID
        join ciudades on ps.Ciudad = CiudadID
        join estados on ps.Estado = EstadoID
        join paises on ps.Pais = PaisID ORDER BY ps.PropiedadID";

        $stmt = $this->db->dbc->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();
    }

    public function getPropiedad(){
        $this->PropiedadID = intval($_GET['PropiedadID']);
        $sql = "SELECT * FROM propiedades WHERE PropiedadID = :PropiedadID"; 
        $stmt = $this->db->dbc->prepare($sql);
        $stmt->bindParam(":PropiedadID", $this->PropiedadID , PDO::PARAM_INT);
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

    public function Ciudades(){
        $sql = "SELECT * FROM Ciudades";
        $stmt = $this->db->dbc->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();
    }
}
?>