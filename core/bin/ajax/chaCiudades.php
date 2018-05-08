<?php
    $db = new Conexion();
    $sql = "SELECT * FROM Ciudades WHERE Estado = :Estado";
    $stmt = $db->dbc->prepare($sql);
    $stmt->bindParam(":Estado", $_POST['Estado'], PDO::PARAM_INT);
    $stmt->execute();
    $resp_est = $stmt->fetchAll();
    

    $html = "";
    if(count($resp_est) > 0) {        
        foreach ($resp_est as $row => $item) {                
            $html .= '<option value="'. $item['CiudadID'] .'">'. $item['Ciudad'] .'</option>';              
        }
    } else {
        $html = '<option value="0">El pais seleccionado no tiene estados asigandos</option>';
    }

    $stmt = null;
    echo $html;
?>