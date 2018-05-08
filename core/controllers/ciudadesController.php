<?php
if(isset($_SESSION['app_id'])) {
    $CiudadID = isset($_GET['CiudadID']) and is_numeric($_GET['CiudadID']) and $_GET['CiudadID'] >= 1;

    require('core/models/classCiudades.php');
    $Ciudades = new Ciudades();

    switch(isset($_GET['mode']) ? $_GET['mode'] : null) {
        case 'add':
            if($_POST) {
                $Ciudades->Add();
                echo 'Entro';
            } else {
                $resp_Pais = $Ciudades->Paises(); 
                include(HTML_DIR . 'ciudades/addciudades.php');
            }
            break;

        case 'edit':
            if($CiudadID) {
                if($_POST) {
                    $Ciudades->Edit();
                } else {
                    $respuesta = $Ciudades->getCiudad();                    
                    $rest_Pais = $Ciudades->Paises();                    
                    include(HTML_DIR . 'ciudades/editciudades.php');
                }
            } else {
                header('location: ?view=homepage&module=ciudades');
            }
            break;

        case 'delete':
            if($CiudadID) {
                $Ciudades->Delete();
            } else {
                header('location: ?view=ciudades');
            }
            break;

        default:
            $respuesta = $Ciudades->Show();
            include(HTML_DIR . 'ciudades/allciudades.php');
            break;
    }
} else {
    header('location: ?view=index');
}
?>