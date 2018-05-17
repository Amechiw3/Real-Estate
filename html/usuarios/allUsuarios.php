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
        <table class="table table-striped table-bordered" id="dataTableUsuarios" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Tipo de usuario</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Nombre completo</th>
                    <th>Fecha de registro</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
        <?php
            foreach ($respuesta as $row => $item) {
                echo'<tr>';
                echo'<td>'. $item["Tipousuario"] .'</td>
                     <td>'. $item["Usuario"] .'</td>
                     <td>'. $item["Email"] .'</td>
                     <td>'. $item["Telefono"] .'</td>
                     <td>'. $item["nombreCompleto"] .'</td>
                     <td>'. $item["created_at"] .'</td>
                     <td id="td-opciones">
                         <div class="btn-group" role="group">
                             <a class="btn btn-primary btn-sm" href="?view=homepage&module=usuarios&mode=edit&UsuarioID='. $item["UsuarioID"] .'">
                                 <i class="fa fa-pencil" aria-hidden="true"></i> Editar
                             </a>				
                             <a class="btn btn-danger btn-sm" href="?view=homepage&module=usuarios&mode=delete&UsuarioID='. $item["UsuarioID"] .'">
                                 <i class="fa fa-trash-o" aria-hidden="true"></i> Borrar
                             </a>
                         </div>				
                     </td>';
                echo'</tr>';
            }
        ?>
            </tbody>
            <tfoot>
                <tr>
                <td><strong>Usuario</strong></td>
                    <td><strong>Tipo de usuario</strong></td>
                    <td><strong>Email</strong></td>
                    <td><strong>Telefono</strong></td>
                    <td><strong>Nombre completo</strong></td>
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