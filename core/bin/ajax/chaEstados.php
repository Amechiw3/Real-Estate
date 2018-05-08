<?php
    $db = new Conexion();
    $sql = "SELECT * FROM Estados WHERE Pais = :Pais";
    $stmt = $db->dbc->prepare($sql);
    $stmt->bindParam(":Pais", $_POST['Pais'], PDO::PARAM_INT);
    $stmt->execute();
    $resp_est = $stmt->fetchAll();
    

    $html = "";
    if(count($resp_est) > 0) {        
        foreach ($resp_est as $row => $item) {                
            $html .= '<option value="'. $item['EstadoID'] .'">'. $item['Estado'] .'</option>';              
        }
    } else {
        $html = '<option value="0">El pais seleccionado no tiene estados asigandos</option>';
    }

    $stmt = null;
    echo $html;
?>