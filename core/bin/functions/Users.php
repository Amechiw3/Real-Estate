<?php

function Users() {
    $db = new Conexion();
    $sql = "SELECT * FROM Usuarios;";
    if($db->rows($sql) > 0) {
        foreach ($db->recorrer($sql) as $row => $d) {
            $users[$d['UsuarioID']] = array(
                'UsuarioID' => $d['UsuarioID'],
                'Usuario' => $d['Usuario'],
                'Password' => $d['Password'],
                'Tipousuario' => $d['Tipousuario'],
                'Nombre' => $d['Nombre'],
                'Appaterno' => $d['Appaterno'],
                'Apmaterno' => $d['Apmaterno'],
                'Email' => $d['Email'],
                'Telefono' => $d['Telefono'],
                'Estado' => $d['Estado'],
                'intentos' => $d['intentos'],
                'updated_at' => $d['updated_at'],
                'created_at' => $d['created_at']
            );
        }
    } else {
        $users = false;
    }

    $db->liberar($sql);
    $db->__destruct();

    return $users;
}

?>