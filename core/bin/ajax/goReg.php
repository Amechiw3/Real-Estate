<?php

$db = new Conexion();

$Nombre     = $_POST['Nombre'];
$Appaterno  = $_POST['Appaterno'];
$Apmaterno  = $_POST['Apmaterno'];
$Telefono   = $_POST['Telefono'];
$Usuario    = $_POST['Usuario'];
$Password   = Encrypt($_POST['Password']);
$Email      = $_POST['Email'];


$sql = "SELECT Usuario From Usuarios WHERE Usuario = '$Usuario' OR Email = '$Email' limit 1;";

if($db->rows($sql) == 0) {
    $stmt = $db->dbc->prepare("INSERT INTO Usuarios (Usuario, Password, Tipousuario, Nombre, Appaterno, Apmaterno, Email, Telefono, Estado, updated_at, created_at) ".
    " VALUES (:Usuario, :Password, 2, :Nombre, :Appaterno, :Apmaterno, :Email, :Telefono, 1, '".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')");
        
    $stmt->bindParam(":Nombre",    $Nombre,     PDO::PARAM_STR);
    $stmt->bindParam(":Appaterno", $Appaterno,  PDO::PARAM_STR);
    $stmt->bindParam(":Apmaterno", $Apmaterno,  PDO::PARAM_STR);
    $stmt->bindParam(":Telefono",  $Telefono,   PDO::PARAM_STR);
    $stmt->bindParam(":Usuario",   $Usuario,    PDO::PARAM_STR);
    $stmt->bindParam(":Password",  $Password,   PDO::PARAM_STR);
    $stmt->bindParam(":Email",     $Email,      PDO::PARAM_STR);
    $stmt->execute();

    $sql_2 = "SELECT UsuarioID From Usuarios WHERE Usuario = '$Usuario' AND Email = '$Email' limit 1;";
    $_SESSION['app_id'] = $db->recorrer($sql_2)[0];

    $html = 1;   

} else {
    $data = $db->recorrer($sql)[0];
    if(strtolower($Usuario) == strtolower($data[0])) {
        $html = '<div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>ERROR:</strong> 
            <p>El usuario ingresado ya existe</p>
        </div>';
    } else {
        $html = '<div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>ERROR</strong> 
            <p>El Email ingresado ya existe</p>
        </div>';
    }
    
}

$db->__destruct();

echo $html;

?>