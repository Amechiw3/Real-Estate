<ol class="breadcrumb">
    <li class="breadcrumb-item"><a><span>Dashboard<br></span></a></li>
    <li class="breadcrumb-item"><a><span>Estados</span></a></li>
</ol>
<div class="row">
    <div class="col-12">

<?php
if(count($respuesta) > 0) {
    ?>
    <div class="table-responsive my-2">
        <table class="table table-striped table-bordered" id="dataTableCiudades" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Pais</th>
                    <th>Estado</th>
                    <th>Ciudad</th>
                    <th>Fecha registro</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
        <?php
            foreach ($respuesta as $row => $item) {
                echo'
                <tr>
                    <td>'. $item["Pais"] .'</td>
                    <td>'. $item["Estado"] .'</td>
                    <td>'. $item["Ciudad"] .'</td>
                    <td>'. $item["created_at"] .'</td>
                    <td id="td-opciones">
                        <div class="btn-group d-flex mx-auto" role="group">
                            <a class="btn btn-primary btn-sm" href="?view=homepage&module=ciudades&mode=edit&CiudadID='. $item["CiudadID"] .'">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Editar
                            </a>				
                            <a class="btn btn-danger btn-sm" href="?view=homepage&module=ciudades&mode=delete&CiudadID='. $item["CiudadID"] .'">
                                <i class="fa fa-trash-o" aria-hidden="true"></i> Borrar
                            </a>
                        </div>				
                    </td>
                </tr>';
            }
        ?>
            </tbody>
            <tfoot>
                <tr>
                    <td><strong>Pais</strong></td>
                    <td><strong>Estado</strong></td>
                    <td><strong>Ciudad</strong></td>
                    <td colspan="2"><strong>Fecha registro</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>
<?php
} else {
    echo '
    <div class="alert alert-dismissible alert-info">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4 class="alert-heading">Intormacion:</h4>
        <p class="mb-0">No hay paises listados</p>
    </div>';
}
?>
    </div>
</div>