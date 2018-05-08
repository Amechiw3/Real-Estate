<ol class="breadcrumb">
  <li class="breadcrumb-item"><a><span>Dashboard<br></span></a></li>
  <li class="breadcrumb-item"><a><span>Propiedad</span></a></li>
  <li class="breadcrumb-item"><a><span>Actualizar propiedad</span></a></li>
</ol>
<div class="row">
  
  <?php
    if(isset($_GET['error'])){
      echo '<div class="col-12">
      <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4 class="alert-heading">Aviso:</h4>
        <p class="mb-0">Ha ocurrido un error al intentar guardar la propiedad</p>
      </div>';
    }

    if(isset($_GET['success'])){
      echo '<div class="col-12">
      <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4 class="alert-heading">Completado:</h4>
        <p class="mb-0">La propiedad ha sido actualizada</p>
      </div>
      </div>';
    }
    
  ?>
  
  <div class="col-12">
    <?php 
    ?>
    <form class="mb-2" action="?view=homepage&module=propiedades&mode=edit&PropiedadID=<?= $_GET['PropiedadID'] ?>" method="POST" enctype="application/x-www-form-urlencoded">
      <div class="form-group">
        <label>Pais</label>
        <select class="form-control" name="Pais" id="Pais" onchange="chaEstados()">
          <?php
            foreach ($resp_pai as $row => $item) {
              echo '<option value="'. $item['PaisID'] .'"';
              echo $respuesta[0]['Pais'] == $item['PaisID'] ? "selected" : "";
              echo '>'. $item['Pais'] .'</option>';              
            }
            
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Estado</label>
        <select class="form-control" name="Estado" id="Estado" onchange="chaCiudad()">
          <?php
            foreach ($resp_est as $row => $item) {
              if($item['Pais'] == $respuesta[0]['Pais']) {
                echo '<option value="'. $item['EstadoID'] .'"';
                echo $respuesta[0]['Estado'] == $item['EstadoID'] ? "selected" : "";
                echo '>'. $item['Estado'] .'</option>';
              }          
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Municipio</label>
        <select class="form-control" name="Ciudad" id="Ciudad">
          <?php
            foreach ($resp_ciu as $row => $item) {
              if($item['Estado'] == $respuesta[0]['Estado']) { 
                echo '<option value="'. $item['CiudadID'] .'"';
                echo $respuesta[0]['Ciudad'] == $item['CiudadID'] ? "selected" : "";
                echo '>'. $item['Ciudad'] .'</option>';
              }
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-8">
            <label class="col-form-label">Colonia</label>
            <input class="form-control" type="text" name="Colonia" id="Colonia" value="<?= $respuesta[0]['Colonia'] ?>">
          </div>
          <div class="col-4">
            <label class="col-form-label">Codigo postal</label>
            <input class="form-control" type="text" name="CodigoPostal" id="CodigoPostal" value="<?= $respuesta[0]['CodigoPostal'] ?>">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-8">
            <label class="col-form-label">Calle</label>
            <input class="form-control" type="text" name="Calle" id="Calle" value="<?= $respuesta[0]['Calle'] ?>">
          </div>
          <div class="col-4">
            <label class="col-form-label">Numero</label>
            <input class="form-control" type="text" name="Numero" id="Numero" value="<?= $respuesta[0]['Numero'] ?>">
          </div>
        </div>
      </div>      
      <hr>
      <div class="form-group">
        <div class="form-row">
          <div class="col">
            <img class="img-thumbnail img-fluid d-flex m-auto" width="100%" id="previewimg">
          </div>
          <div class="col-6 d-flex flex-column justify-content-between">
            <label class="col-form-label">Imagen</label>
            <input type="file" accept="image/*" name="imagenprop" required="" id="imagenprop" value="<?= $respuesta[0]['Imagen'] ?>">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-8">
              <label class="col-form-label">Tipo de propiedad</label>
              <select class="form-control" name="PropiedadTipo" id="PropiedadTipo">
                <option value="1" selected="">Casa</option>
                <option value="2">Departamento</option>
                <option value="3">Terreno</option>
              </select>
            </div>
            <div class="col-4">
              <label class="col-form-label">Fecha de la propiedad</label>
              <input class="form-control" type="date" name="PropiedadFecha" id="PropiedadFecha" value="<?= $respuesta[0]['PropiedadFecha'] ?>">
            </div>
          </div>
      </div>
      <div class="form-group">
        <label>Precio</label>
        <input class="form-control" type="number" name="Precio" id="Precio" value="<?= $respuesta[0]['Precio'] ?>">
      </div>
      <div class="form-group">
        <label>Informacion Adicional</label>
        <textarea class="form-control form-control-sm" name="InformacionAdic" id="InformacionAdic"><?= $respuesta[0]['InformacionAdic'] ?></textarea>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-6">
            <label class="col-form-label">Area</label>
            <input class="form-control" type="number" name="Area" id="Area" value="<?= $respuesta[0]['Area'] ?>">
          </div>
          <div class="col-6">
            <label class="col-form-label">Numero de cuartos</label>
            <input class="form-control" type="number" name="NumeroHab" id="NumeroHab" value="<?= $respuesta[0]['NumeroHab'] ?>">
          </div>
        </div>
      </div>
      <button class="btn btn-primary d-flex ml-auto" type="submit">Guardar</button>
    </form>
  </div>
</div>
<script src="views/app/js/Estados.js"></script>
<script src="views/app/js/Ciudades.js"></script>