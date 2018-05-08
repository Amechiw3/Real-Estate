<?php
if(isset($_SESSION['app_id'])) {
    $EstadoID = isset($_GET['EstadoID']) and is_numeric($_GET['EstadoID']) and $_GET['EstadoID'] >= 1;

    require('core/models/classEstados.php');
    $estados = new Estados();

    switch(isset($_GET['mode']) ? $_GET['mode'] : null) {
        case 'add':
            if($_POST) {
                $estados->Add();
                echo 'Entro';
            } else {
                include(HTML_DIR . 'estados/addestados.php');
            }
            break;

        case 'edit':
            if($EstadoID) {
                if($_POST) {
                    $estados->Edit();
                } else {
                    $respuesta = $estados->getEstado();                    
                    $rest_Pais = $estados->Paises();                    
                    include(HTML_DIR . 'estados/editestados.php');
                }
            } else {
                header('location: ?view=homepage&module=estados');
            }
            break;

        case 'delete':
            if($EstadoID) {
                $estados->Delete();
            } else {
                header('location: ?view=estados');
            }
            break;

        default:
            $respuesta = $estados->Show();
            include(HTML_DIR . 'estados/allestados.php');
            break;
    }
} else {
    header('location: ?view=index');
}
?>