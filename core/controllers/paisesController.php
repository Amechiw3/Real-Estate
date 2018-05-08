<?php
if(isset($_SESSION['app_id'])) {
    $PaisID = isset($_GET['PaisID']) and is_numeric($_GET['PaisID']) and $_GET['PaisID'] >= 1;

    require('core/models/classPaises.php');
    $pais = new Paises();

    switch(isset($_GET['mode']) ? $_GET['mode'] : null) {
        case 'add':
            if($_POST) {
                $pais->Add();
            } else {
                include(HTML_DIR . 'paises/addpaises.php');
            }
            break;

        case 'edit':
            if($PaisID) {
                if($_POST) {
                    $pais->Edit();
                } else {
                    $respuesta = $pais->getPais();      
                    include(HTML_DIR . 'paises/editpaises.php');
                }
            } else {
                header('location: ?view=homepage&module=paisesx');
            }
            break;

        case 'delete':
            if($PaisID) {
                $pais->Delete();
            } else {
                header('location: ?view=paises');
            }
            break;

        default:
            $respuesta = $pais->Show();
            include(HTML_DIR . 'paises/allpaises.php');
            break;
    }
} else {
    header('location: ?view=index');
}
?>