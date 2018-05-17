<?php
if(isset($_SESSION['app_id'])) {
    $UsuarioID = isset($_GET['UsuarioID']) and is_numeric($_GET['UsuarioID']) and $_GET['UsuarioID'] >= 1;

    require('core/models/classUsuarios.php');
    $usuarios = new Usuarios();

    switch(isset($_GET['mode']) ? $_GET['mode'] : null) {
        case 'add':
            if($_POST) {
                $usuarios->Add();
            } else {
                
                include(HTML_DIR . 'usuarios/addUsuarios.php');
            }
            break;

        case 'edit':
            if($UsuarioID) {
                $respuesta = $usuarios->getUsuario();
                
                if($_POST) {
                    $usuarios->setImagen($respuesta[0]['Imagen']);
                    
                    $usuarios->Edit();
                } else {
                                  
                    include(HTML_DIR . 'usuarios/editUsuarios.php');
                }
            } else {
                header('location: ?view=homepage&module=usuarios');
            }
            break;

        case 'delete':
            if($UsuarioID) {
                $usuarios->Delete();
            } else {
                header('location: ?view=usuarios');
            }
            break;

        default:
            $respuesta = $usuarios->Show();
            include(HTML_DIR . 'usuarios/allUsuarios.php');
            break;
    }
} else {
    header('location: ?view=index');
}
?>