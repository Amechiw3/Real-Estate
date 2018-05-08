<?php

if($_POST){
    require('core/core.php');
    switch(isset($_GET['mode']) ? $_GET['mode'] : null) {
        case 'login':
            require('core/bin/ajax/gologin.php');
            break;

        case 'reg':
            require('core/bin/ajax/goReg.php');
            break;

        case 'chaEstados':
            require('core/bin/ajax/chaEstados.php');
            break;

        case 'chaCiudades':
            require('core/bin/ajax/chaCiudades.php');
            break;

        default:
            header('location: index.php');
            break;

    }

} else {
    header('location: index.php');
}

?>