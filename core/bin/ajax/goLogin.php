<?php

    $db = new Conexion();

    if(!empty($_POST['Usuario']) and !empty($_POST['Password'])) {
        $Usuario = $db->dbc->quote($_POST['Usuario']);
        $Password = Encrypt($_POST['Password']);

        $sql = "SELECT UsuarioID FROM usuarios WHERE(Usuario=$Usuario OR Email=$Usuario) and Password='$Password' LIMIT 1;";
        if($db->rows($sql) > 0) {
            //var_dump( $db->recorrer($sql)[0] );
            if($_POST['session']) { 
                ini_set('session.cookie_lifetime', time() + (60*64*24));
            }
            
            $_SESSION['app_id'] = $db->recorrer($sql)[0][0];
            //var_dump($db->recorrer($sql)[0][0]);
            echo 1;
        } else {
            echo '
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>ERROR</strong> Las credenciales son incorrectas
        </div>';
        }
        
    } else {
        echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>ERROR</strong> Todos los campos deben tener informacion.</div>';
    }

?>