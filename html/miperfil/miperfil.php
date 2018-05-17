<ol class="breadcrumb">
  <li class="breadcrumb-item"><a><span>Dashboard<br></span></a></li>
  <li class="breadcrumb-item"><a><span>Mi perfil<br></span></a></li>
</ol>
<div class="row">
    <?php
        if(isset($_GET['error'])){
        echo '<div class="col-12">
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4 class="alert-heading">Aviso:</h4>
            <p class="mb-0">Ha ocurrido un error al intentar actualizar tu informacion</p>
        </div>';
        }

        if(isset($_GET['success'])){
        echo '<div class="col-12">
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4 class="alert-heading">Completado:</h4>
            <p class="mb-0">Tu informacion ha sido actualizada</p>
        </div>
        </div>';
        }
    ?>
    <div class="col-12">
        <div class="btn-group btn-group-sm" role="group">
            <button class="btn btn-info" type="button" id="btninfo">Mi informacion</button>
            <button class="btn btn-primary" type="button" id="btneditar">Editar mi informacion</button>
        </div>
    </div>
    <div class="col-12 py-3" id="miinfo">
        <h3>Mi informacion</h3>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <img class="img-thumbnail d-flex mx-auto">
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="row">
                    <div class="col-12">
                        <label class="col-form-label"><b>Nombre</b></label>
                        <p><?=$users[$_SESSION['app_id']]['Nombre']?></p>
                    </div>
                    <div class="col-6">
                        <label class="col-form-label"><b>Apellido Paterno</b></label>
                        <p><?=$users[$_SESSION['app_id']]['Appaterno']?></p>
                    </div>
                    <div class="col-6">
                        <label class="col-form-label"><b>Apellido Materno</b></label>
                        <p><?=$users[$_SESSION['app_id']]['Apmaterno']?></p>
                    </div>
                    <div class="col-12">
                        <label class="col-form-label"><b>Telefono</b></label>
                        <p><?=$users[$_SESSION['app_id']]['Telefono']?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <label class="col-form-label"><b>Usuario</b></label>
                        <p><?=$users[$_SESSION['app_id']]['Usuario']?></p>
                    </div>
                    <div class="col-6">
                        <label class="col-form-label"><b>Rol</b></label>
                        <p><?=$roles[$users[$_SESSION['app_id']]['Tipousuario']]['Tipousuario']?></p>
                    </div>
                    <div class="col-12">
                        <label class="col-form-label"><b>Correo electronico</b></label>
                        <p><?=$users[$_SESSION['app_id']]['Email']?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 py-3" id="editarinfo">
        <h3>Editar</h3>
        <form action="?view=homepage&module=miperfil&mode=edit&UsuarioID=<?=$users[$_SESSION['app_id']]['UsuarioID']?>" method="POST" enctype="application/x-www-form-urlencoded">
            <div class="form-row">
                <div class="col-sm-12 col-md-4">
                    <img class="img-thumbnail img-fluid d-flex mx-auto" src="<?=$users[$_SESSION['app_id']]['Imagen']?>">
                    <input type="file" accept="image/*">
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="form-row">
                        <div class="col-12">
                            <label class="col-form-label">Nombre</label>
                            <input class="form-control" type="text" name="Nombre" id="Nombre" value="<?=$users[$_SESSION['app_id']]['Nombre']?>">
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">Apellido Paterno</label>
                            <input class="form-control" type="text" name="Appaterno" id="Appaterno" value="<?=$users[$_SESSION['app_id']]['Appaterno']?>">
                        </div>
                        <div class="col-6">
                            <label class="col-form-label">Apellido Materno</label>
                            <input class="form-control" type="text" name="Apmaterno" id="Apmaterno" value="<?=$users[$_SESSION['app_id']]['Apmaterno']?>">
                        </div>
                        <div class="col-12">
                            <label class="col-form-label">Telefono</label>
                            <input class="form-control" type="tel" name="Telefono" id="Telefono" value="<?=$users[$_SESSION['app_id']]['Telefono']?>">
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col">
                            <label class="col-form-label">Usuario</label>
                            <input class="form-control" type="text" name="Usuario" id="Usuario" value="<?=$users[$_SESSION['app_id']]['Usuario']?>">
                        </div>
                        <div class="col" <?php echo $users[$_SESSION['app_id']]['Tipousuario'] != 1 ? 'hidden' : '' ?>>
                            <label class="col-form-label">Rol</label>
                            <select class="custom-select" name="Tipousuario" id="Tipousuario" >
                            <?php
                                foreach ($roles as $row => $item) {
                                    echo '<option value="'. $item['TipousuariosID'] .'" ';
                                    echo $users[$_SESSION['app_id']]['Tipousuario'] == $item['TipousuarioID'] ? 'Selected' : '';
                                    echo '>'. $item['Tipousuario'] .'</option>';
                                }
                            ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="col-form-label">Contraseña</label>
                            <input class="form-control" type="text" name="Password" id="Password">
                        </div>
                        <div class="col-12">
                            <label class="col-form-label">Correo electronico</label>
                            <input class="form-control" type="tel" name="Email" id="Email" value="<?=$users[$_SESSION['app_id']]['Email']?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 mt-2">
                    <button type="submit" class="btn btn-success d-flex ml-auto">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>