<ol class="breadcrumb">
    <li class="breadcrumb-item"><a><span>Dashboard<br></span></a></li>
    <li class="breadcrumb-item"><a><span>Propiedades</span></a></li>
</ol>
<div class="row">
    <div class="col-12">

<?php
if(count($respuesta) > 0) {
    ?>
    <div class="table-responsive my-2">
        <table class="table table-striped table-bordered" id="dataTablePropiedades" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Fecha construccion</th>
                    <th>Ubicacion</th>
                    <th>Direccion</th>
                    <th>Precio</th>
                    <th>Fecha registro</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
        <?php
            foreach ($respuesta as $row => $item) {
                echo'
                <tr>
                    <td>'. $item["PropiedadFecha"] .'</td>
                    <td>'. $item["ubicacion"] .'</td>
                    <td>'. $item["direccion"] .'</td>
                    <td>$'. $item["precios"] .'</td>
                    <td>'. $item["created_at"] .'</td>
                    <td id="td-opciones">
                        <div class="btn-group" role="group">
                            <a class="btn btn-primary btn-sm" href="?view=homepage&module=propiedades&mode=edit&PropiedadID='. $item["PropiedadID"] .'">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Editar
                            </a>				
                            <a class="btn btn-danger btn-sm" href="?view=homepage&module=propiedades&mode=delete&PropiedadID='. $item["PropiedadID"] .'">
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
                    <td><strong>Fecha construccion</strong></td>
                    <td><strong>Ubicacion</strong></td>
                    <td><strong>Direccion</strong></td>
                    <td><strong>Precio</strong></td>
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
        <p class="mb-0">No hay propiedades listadas</p>
    </div>';
}
?>
    </div>
</div>