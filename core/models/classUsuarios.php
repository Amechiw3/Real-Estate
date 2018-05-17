<?php
class Usuarios {

    private $db;
    private $UsuarioID;
    private $Usuario;
    private $Password;
    private $Tipousuario;
    private $Imagen;
    private $Nombre;
    private $Appaterno;
    private $Apmaterno;
    private $Email;
    private $Telefono;
    private $Estado;
    private $updated_at;
    private $created_at;

    public function __construct() {
        $this->db = new Conexion();
    }

    public function __destruct() {
        $this->db = null;
    }

    public function setImagen($srcImagen) {
        $this->Imagen = $srcImagen;
    }
    public function getImagen() {
        return $this->Imagen;
    }

    private function Errores($url) {
        try {
            if( empty($_POST['Usuario'])    || empty($_POST['Nombre'])      || 
                empty($_POST['Appaterno'])  || empty($_POST['Apmaterno'])   || 
                empty($_POST['Email'])      || empty($_POST['Telefono'])    || 
                empty($_POST['Estado'])     ) {

                throw new Exception(1);
            } else {
                
                $this->Usuario      = $_POST['Usuario'];
                if(!empty($_POST['Password'])){
                    $this->Password = Encrypt($_POST['Password']);
                }
                $this->Tipousuario  = $_POST['Tipousuario'];
                $this->Imagen       = $_POST['Imagen'];
                $this->Nombre       = $_POST['Nombre'];
                $this->Appaterno    = $_POST['Appaterno'];
                $this->Apmaterno    = $_POST['Apmaterno'];
                $this->Email        = $_POST['Email'];
                $this->Telefono     = $_POST['Telefono'];
                $this->Estado       = $_POST['Estado'];
                $this->updated_at = date('Y-m-d', time());
                $this->created_at = date('Y-m-d', time());
            }

        } catch(Exception $error) {
            header('location: '. $url . $error->getMessage());
            exit;
        }
    }

    private function Errores2($url) {
        try {
            if(!Empty($this->Imagen)) {//Editar
                if( empty($_POST['Usuario'])) {
                    throw new Exception(1);
                } else if(empty($_POST['Nombre'])) {
                    throw new Exception(2);
                } else if(empty($_POST['Appaterno'])) {
                    throw new Exception(3);
                } else if(empty($_POST['Apmaterno'])) {
                    throw new Exception(4);
                } else if(empty($_POST['Email'])) {
                    throw new Exception(5);
                } else if(empty($_POST['Telefono'])) {
                    throw new Exception(6);
                } else {
                    if(!empty($_FILES['Imagen']['name'])) {
                        
                        $imgFile = $_FILES['Imagen']['name'];
                        $tmp_dir = $_FILES['Imagen']['tmp_name'];
                        $imgSize = $_FILES['Imagen']['size'];
                        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
                        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
                        $userImagen = rand(1,1000000)."-".date('Ymd-His', time()).".".$imgExt;
                        if(in_array($imgExt, $valid_extensions)){
                            if($imgSize < 5000000) {
                                if(!empty($this->Imagen)) {
                                    unlink(IMAGEN_USER_DIR.$this->Imagen);
                                }
                                move_uploaded_file($tmp_dir,IMAGEN_USER_DIR.$userImagen);
                                $this->Imagen = $userImagen;
                                
                            } else {
                                throw new Exception(9);
                            }
                        } else {
                            throw new Exception(10);
                        }
                    }
                    $this->Usuario = $_POST['Usuario'];
                    if(!empty($_POST['Password'])){
                        $this->Password = Encrypt($_POST['Password']);
                    }
                    $this->Tipousuario = $_POST['Tipousuario'];
                    $this->Nombre      = $_POST['Nombre'];
                    $this->Appaterno   = $_POST['Appaterno'];
                    $this->Apmaterno   = $_POST['Apmaterno'];
                    $this->Email       = $_POST['Email'];
                    $this->Telefono    = $_POST['Telefono'];
                    $this->updated_at = date('Y-m-d', time());
                    $this->created_at = date('Y-m-d', time());
                    
                }
            } else {//Agregar
                if( empty($_POST['Usuario'])) {
                    throw new Exception(1);
                } else if(empty($_POST['Nombre'])) {
                    throw new Exception(2);
                } else if(empty($_POST['Appaterno'])) {
                    throw new Exception(3);
                } else if(empty($_POST['Apmaterno'])) {
                    throw new Exception(4);
                } else if(empty($_POST['Email'])) {
                    throw new Exception(5);
                } else if(empty($_POST['Telefono'])) {
                    throw new Exception(6);
                } else if(empty($_FILES['Imagen']['name'])) {
                    throw new Exception(8);
                } else {
                    $imgFile = $_FILES['Imagen']['name'];
                    $tmp_dir = $_FILES['Imagen']['tmp_name'];
                    $imgSize = $_FILES['Imagen']['size'];
                    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
                    $userImagen = rand(1,1000000)."-".date('Ymd-His', time()).".".$imgExt;
                    if(in_array($imgExt, $valid_extensions)){
                        if($imgSize < 5000000) {
                            move_uploaded_file($tmp_dir,IMAGEN_USER_DIR.$userImagen);
                            $this->Usuario = $_POST['Usuario'];
                            if(!empty($_POST['Password'])){
                                $this->Password = Encrypt($_POST['Password']);
                            }
                            $this->Tipousuario  = $_POST['Tipousuario'];
                            $this->Imagen       = $userImagen;
                            $this->Nombre       = $_POST['Nombre'];
                            $this->Appaterno    = $_POST['Appaterno'];
                            $this->Apmaterno    = $_POST['Apmaterno'];
                            $this->Email        = $_POST['Email'];
                            $this->Telefono     = $_POST['Telefono'];
                            $this->updated_at = date('Y-m-d', time());
                            $this->created_at = date('Y-m-d', time());
                        } else {
                            throw new Exception(9);
                        }
                    } else {
                        throw new Exception(10);
                    }
                }
            }
        } catch(Exception $error) {
            header('location: '. $url . $error->getMessage());
            exit;
        }
    }

    private function ValidarImagen($url) {
        try {
            if(empty($_POST['Imagen'])) {
                throw new Exception(2);
            } else {
                $upload_dir = 'views/app/images/usuarios/';
                $imgFile = $_FILES['Imagen']['name'];
                $tmp_dir = $_FILES['Imagen']['tmp_name'];
                $imgSize = $_FILES['Imagen']['size'];
                $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
                $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
                $userImagen = rand(1000,1000000).".".$imgExt;
                if(in_array($imgExt, $valid_extensions)){
                    if($imgSize < 5000000) {
                        $this->Imagen = $userImagen;
                        move_uploaded_file($tmp_dir,$upload_dir.$userImagen);
                    } else {
                        throw new Exception(4);
                    }
                } else {
                    throw new Exception(3);
                }
            }

        } catch(Exception $error) {
            header('location: '. $url . $error->getMessage());
            exit;
        }
    }
    
    public function Add() {
        $this->Errores2('?view=homepage&module=usuarios&mode=add&error=');
        
        $sql = 'INSERT INTO usuarios (Nombre, Appaterno, Apmaterno, Email, Telefono, Usuario, Password, Tipousuario, Imagen, updated_at, created_at) '.
        'VALUES (:Nombre, :Appaterno, :Apmaterno, :Email, :Telefono, :Usuario, :Password, :Tipousuario, :Imagen, :updated_at, :created_at)';
        
        //var_dump($sql);
        
        $stmt = $this->db->dbc->prepare($sql);
        $stmt->bindParam(":Nombre",     $this->Nombre,      PDO::PARAM_STR);
        $stmt->bindParam(":Appaterno",  $this->Appaterno,   PDO::PARAM_STR);
        $stmt->bindParam(":Apmaterno",  $this->Apmaterno,   PDO::PARAM_STR);
        $stmt->bindParam(":Email",      $this->Email,       PDO::PARAM_STR);        
        $stmt->bindParam(":Telefono",   $this->Telefono,    PDO::PARAM_STR);
        $stmt->bindParam(":Usuario",    $this->Usuario,     PDO::PARAM_STR);
        $stmt->bindParam(":Password",   $this->Password,    PDO::PARAM_STR);
        $stmt->bindParam(":Tipousuario",$this->Tipousuario, PDO::PARAM_INT);
        $stmt->bindParam(":Imagen",     $this->Imagen,      PDO::PARAM_STR);
        $stmt->bindParam(":updated_at", $this->updated_at,  PDO::PARAM_STR);
        $stmt->bindParam(":created_at", $this->created_at,  PDO::PARAM_STR);
        $stmt->execute();
        $stmt = null;

        header('location: ?view=homepage&module=usuarios&mode=add&success=true');
    }

    public function Edit() {
        $this->UsuarioID = intval($_GET['UsuarioID']);
        $this->Errores2('?view=homepage&module=usuarios&mode=edit&UsuarioID='. $this->UsuarioID .'&error=');
        
        $sql = 'UPDATE usuarios SET
                Nombre      = :Nombre,
                Appaterno   = :Appaterno,
                Apmaterno   = :Apmaterno,
                Telefono    = :Telefono,
                Usuario     = :Usuario,
                Tipousuario = :Tipousuario,
                Email   = :Email,
                updated_at = :updated_at ';

        if(!empty($_FILES['Imagen']['name'])) {
            $sql .= ", Imagen = :Imagen";
            if($_POST['Password']){
                $sql .= ", Password = :Password";
            }
        } else {
            if($_POST['Password']){
                $sql .= ", Password = :Password";
            }
        }
        $sql .= ' WHERE (UsuarioID = :UsuarioID)';

        $stmt = $this->db->dbc->prepare($sql);

        $stmt->bindParam(":Nombre",      $this->Nombre,      PDO::PARAM_STR);
        $stmt->bindParam(":Appaterno",   $this->Appaterno,   PDO::PARAM_STR);
        $stmt->bindParam(":Apmaterno",   $this->Apmaterno,   PDO::PARAM_STR);
        $stmt->bindParam(":Telefono",    $this->Telefono,    PDO::PARAM_STR);
        $stmt->bindParam(":Usuario",     $this->Usuario,     PDO::PARAM_STR);
        $stmt->bindParam(":Tipousuario", $this->Tipousuario, PDO::PARAM_INT);
        $stmt->bindParam(":Email",       $this->Email,       PDO::PARAM_STR);
        $stmt->bindParam(":updated_at",  $this->updated_at,  PDO::PARAM_STR);
        $stmt->bindParam(":UsuarioID",   $this->UsuarioID ,  PDO::PARAM_INT);

        if(!empty($_FILES['Imagen']['name'])) {        
            $stmt->bindParam(":Imagen",  $this->Imagen ,  PDO::PARAM_STR);
            if($_POST['Password']){
                $stmt->bindParam(":Password",  $this->Password ,  PDO::PARAM_STR);
            }
        } else {
            if($_POST['Password']){                
                $stmt->bindParam(":Password",  $this->Password ,  PDO::PARAM_STR);
            }
        }
        $stmt->execute();
        $stmt = null;

        header('location: ?view=homepage&module=usuarios&mode=edit&UsuarioID='. $this->UsuarioID .'&success=true');
    }

    public function Delete() {
        $this->UsuarioID = intval($_GET['UsuarioID']);
        $stmt = $this->db->dbc->prepare("DELETE FROM propiedades WHERE (UsuarioID = :UsuarioID)");
        $stmt->bindParam(":UsuarioID", $this->UsuarioID , PDO::PARAM_INT);
        $stmt->execute();
        $stmt = null;
        header('location: ?view=homepage&module=propiedades');
    }
    
    public function Show() {
        $sql = "SELECT usuarios.UsuarioID, usuarios.Usuario, 
        tiposusuarios.Tipousuario, usuarios.Imagen,
        concat(usuarios.Nombre,' ', usuarios.Appaterno,' ',
        usuarios.Apmaterno) as nombreCompleto, usuarios.Email, 
        usuarios.Telefono, usuarios.Estado,
        usuarios.updated_at,
        usuarios.created_at
        FROM usuarios
        INNER JOIN tiposusuarios ON usuarios.Tipousuario = tiposusuarios.TipousuarioID
        ORDER BY usuarios.UsuarioID ASC";

        $stmt = $this->db->dbc->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();
    }

    public function getUsuario(){
        $this->UsuarioID = intval($_GET['UsuarioID']);
        $sql = "SELECT * FROM usuarios WHERE UsuarioID = :UsuarioID"; 
        $stmt = $this->db->dbc->prepare($sql);
        $stmt->bindParam(":UsuarioID", $this->UsuarioID , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();

        $stmt->close();
    }
}
?>