<?php
if(isset($_SESSION['app_id'])) {
    $UsuarioID = isset($_GET['UsuarioID']) and is_numeric($_GET['UsuarioID']) and $_GET['UsuarioID'] >= 1;

    require('core/models/classMiPerfil.php');
    $MiPerfil = new MiUsuario();

    switch(isset($_GET['mode']) ? $_GET['mode'] : null) {
        case 'edit':
            if($UsuarioID) {
                if($_POST) {
                    $MiPerfil->Edit();
                }
            } else {
                header('location: ?view=homepage&module=miperfil');
            }
            break;
        default:
            include(HTML_DIR . 'miperfil/miperfil.php');        
            break;
    }
    
} else {
    header('location: ?view=index');
}
?>