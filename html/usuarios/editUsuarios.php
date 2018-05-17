<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="?view=homepage"><span>Dashboard<br></span></a></li>
  <li class="breadcrumb-item"><a href="?view=homepage&module=usuarios"><span>Usuarios</span></a></li>
  <li class="breadcrumb-item"><a><span>Actualizar usuario</span></a></li>
</ol>
<div class="row">
  
  <?php
    if(isset($_GET['error'])){
      if($_GET['error'] == 1) {
        echo '<div class="col-12">
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading">Aviso:</h4>
          <p class="mb-0">Ha ocurrido un error al intentar guardar al usuario.
          <br>Debe introducir un usuario
          </p>
        </div>';
      }
      if($_GET['error'] == 2) {
        echo '<div class="col-12">
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading">Aviso:</h4>
          <p class="mb-0">Ha ocurrido un error al intentar guardar al usuario.
          <br>Debe introducir el nombre del usuario
          </p>
        </div>';
      }
      if($_GET['error'] == 3) {
        echo '<div class="col-12">
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading">Aviso:</h4>
          <p class="mb-0">Ha ocurrido un error al intentar guardar al usuario.
          <br>Debe introducir el apellido paterno del usuario
          </p>
        </div>';
      }
      if($_GET['error'] == 4) {
        echo '<div class="col-12">
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading">Aviso:</h4>
          <p class="mb-0">Ha ocurrido un error al intentar guardar al usuario.
          <br>Debe introducir el apellido materno del usuario
          </p>
        </div>';
      }
      if($_GET['error'] == 5) {
        echo '<div class="col-12">
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading">Aviso:</h4>
          <p class="mb-0">Ha ocurrido un error al intentar guardar al usuario.
          <br>Debe introducir un correo electronico
          </p>
        </div>';
      }
      if($_GET['error'] == 6) {
        echo '<div class="col-12">
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading">Aviso:</h4>
          <p class="mb-0">Ha ocurrido un error al intentar guardar al usuario.
          <br>Debe introducir un telefono del usuario
          </p>
        </div>';
      }
      if($_GET['error'] == 8) {
        echo '<div class="col-12">
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading">Aviso:</h4>
          <p class="mb-0">Ha ocurrido un error al intentar guardar al usuario.
          <br>Debe seleccionar una imagen para el usuario
          </p>
        </div>';
      }
      if($_GET['error'] == 9) {
        echo '<div class="col-12">
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading">Aviso:</h4>
          <p class="mb-0">Ha ocurrido un error al intentar guardar al usuario.
          <br>La imagen supera el limite de tamaño (5MB)
          </p>
        </div>';
      }
      if($_GET['error'] == 10) {
        echo '<div class="col-12">
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <h4 class="alert-heading">Aviso:</h4>
          <p class="mb-0">Ha ocurrido un error al intentar guardar al usuario.
          <br>La imagen no cuenta con el formato adecuado
          </p>
        </div>';
      }

    }

    if(isset($_GET['success'])){
      echo '<div class="col-12">
      <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4 class="alert-heading">Completado:</h4>
        <p class="mb-0">El usuario ha sido actualizado</p>
      </div>
      </div>';
    }
  ?>

  <div class="col-12">
    <form class="mb-2" action="?view=homepage&module=usuarios&mode=edit&UsuarioID=<?= $respuesta[0]['UsuarioID'] ?>" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <div class="form-row">
          <div class="col-md-3 p-2">
            <div class="form-row">
              <div class="col-12 px-5">
                <img class="img-fluid img-thumbnail" width="100%" id="preusu" src="<?= IMAGEN_USER_DIR.$respuesta[0]['Imagen'] ?>" alt="">
              </div>
              <div class="col-12 px-3">
                <input class="form-control-file" type="file" accept="image/*" hidden name="Imagen" id="Imagen" onchange="previewImgUsu(this)">
                <button class="btn btn-primary btn-sm btn-block" onclick="clickImage()" type="button" id="btnImage">Selecciona una imagen</button>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="form-group">
              <label>Nombre</label>
              <input class="form-control form-control-sm" type="text" name="Nombre" id="Nombre" value="<?= $respuesta[0]['Nombre'] ?>">
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-6">
                  <label class="col-form-label">Apellido paterno</label>
                  <input class="form-control form-control-sm" type="text" name="Appaterno" id="Appaterno" value="<?= $respuesta[0]['Appaterno'] ?>">
                </div>
                <div class="col-6">
                  <label class="col-form-label">Apellido materno</label>
                  <input class="form-control form-control-sm" type="text" name="Apmaterno" id="Apmaterno" value="<?= $respuesta[0]['Apmaterno'] ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Telefono</label>
              <input class="form-control form-control-sm" type="tel" name="Telefono" id="Telefono" value="<?= $respuesta[0]['Telefono'] ?>">
            </div>
            <hr>
            <div class="form-group">
              <div class="form-row">
                <div class="col-6">
                  <label class="col-form-label">Usuario</label>
                  <input class="form-control form-control-sm" type="text" name="Usuario" id="Usuario" value="<?= $respuesta[0]['Usuario'] ?>">
                </div>
                <div class="col-6">
                  <label class="col-form-label">Nivel de usuario</label>
                  <select class="form-control form-control-sm" name="Tipousuario" id="Tipousuario">
                  <?php
                    foreach ($roles as $row => $item) {
                      echo '<option value="'. $item['TipousuarioID'] .'" ';
                    
                      echo '>'. $item['Tipousuario'] .'</option>';
                    }
                  ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-6">
                  <label class="col-form-label">Contraseña</label>
                  <input class="form-control form-control-sm" type="password" name="Password" id="Password">
                </div>
                <div class="col-6">
                  <label class="col-form-label">Vuelve a escribir la contraseña</label>
                  <input class="form-control form-control-sm" type="password" name="RePassword" id="RePassword">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Correo electronico</label>
              <input class="form-control form-control-sm" type="email" name="Email" id="Email" value="<?= $respuesta[0]['Email'] ?>">
            </div>
          </div>
        </div>
      </div>  
      <button class="btn btn-primary d-flex ml-auto" type="submit">Guardar</button>
    </form>
  </div>
</div>
<script src="views/app/js/addUsuarios.js"></script>