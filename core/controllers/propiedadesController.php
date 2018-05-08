<?php
if(isset($_SESSION['app_id'])) {
    $PropiedadID = isset($_GET['PropiedadID']) and is_numeric($_GET['PropiedadID']) and $_GET['PropiedadID'] >= 1;

    require('core/models/classPropiedades.php');
    $propiedades = new Propiedades();

    switch(isset($_GET['mode']) ? $_GET['mode'] : null) {
        case 'add':
            if($_POST) {
                $propiedades->Add();
            } else {
                
                include(HTML_DIR . 'propiedades/addPropiedades.php');
            }
            break;

        case 'edit':
            if($PropiedadID) {
                if($_POST) {
                    $propiedades->Edit();
                } else {
                    $respuesta = $propiedades->getPropiedad();   
                    $resp_pai = $propiedades->Paises();
                    $resp_est = $propiedades->Estados();
                    $resp_ciu = $propiedades->Ciudades();   
                                  
                    include(HTML_DIR . 'propiedades/editPropiedades.php');
                }
            } else {
                header('location: ?view=homepage&module=propiedades');
            }
            break;

        case 'delete':
            if($PropiedadID) {
                $propiedades->Delete();
            } else {
                header('location: ?view=propiedades');
            }
            break;

        default:
            $respuesta = $propiedades->Show();
            include(HTML_DIR . 'propiedades/allPropiedades.php');
            break;
    }
} else {
    header('location: ?view=index');
}
?>