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
                'Imagen' => $d['Imagen'],
                'Nombre' => $d['Nombre'],
                'Appaterno' => $d['Appaterno'],
                'Apmaterno' => $d['Apmaterno'],
                'Email' => $d['Email'],
                'Telefono' => $d['Telefono'],
                'Estado' => $d['Estado'],
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

function Roles() {
    $db = new Conexion();
    $sql = "SELECT * FROM tiposusuarios;";
    if($db->rows($sql) > 0) {
        foreach ($db->recorrer($sql) as $row => $d) {
            $roles[$d['TipousuarioID']] = array(
                'TipousuarioID' => $d['TipousuarioID'],
                'Tipousuario' => $d['Tipousuario'],
                'Descripcion' => $d['Descripcion'],
                'updated_at' => $d['updated_at'],
                'created_at' => $d['created_at']
            );
        }
    } else {
        $roles = false;
    }

    $db->liberar($sql);
    $db->__destruct();

    return $roles;
}

?>