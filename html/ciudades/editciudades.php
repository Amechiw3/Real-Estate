<ol class="breadcrumb">
  <li class="breadcrumb-item"><a><span>Dashboard<br></span></a></li>
  <li class="breadcrumb-item"><a><span>Ciudades<br></span></a></li>
  <li class="breadcrumb-item"><a><span>Actualizar ciudad</span></a></li>
</ol>
<div class="row">
  
  <?php
    if(isset($_GET['error'])){
      echo '<div class="col-12">
      <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4 class="alert-heading">Aviso:</h4>
        <p class="mb-0">Ha ocurrido un error al intentar guardar el estado</p>
      </div>';
    }

    if(isset($_GET['success'])){
      echo '<div class="col-12">
      <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4 class="alert-heading">Completado:</h4>
        <p class="mb-0">La ciudad '. $respuesta[0]['Ciudad'] .' ha sido actualizado</p>
      </div>
      </div>';
    }
  ?>
  
  <div class="col-12">
    <form class="mb-2" action="?view=homepage&module=ciudades&mode=edit&CiudadID=<?=$respuesta[0]['CiudadID']?>" method="POST" enctype="application/x-www-form-urlencoded">
      <div class="form-group">
        <label>Pais</label>
        <select class="form-control" name="Pais" id="Pais" onchange="chaEstados()">
          <option value="0">Selecciones un pais</option>
          <?php
            foreach ($rest_Pais as $row => $item) {                
              echo '<option value="'. $item['PaisID'] .'"';
              echo '>'. $item['Pais'] .'</option>';                
            }
          ?>
        </select>
      </div>      
      <div class="form-group">
        <label>Estado</label>
        <select class="form-control" name="Estado" id="Estado" onchange="chaCiudad()">               
        </select>
      </div>
      <div class="form-group">
        <label>Ciudad</label>
        <input type="text" class="form-control" name="Ciudad" id="Ciudad" value="<?= $respuesta[0]['Ciudad']; ?>">
      </div>
      <button class="btn btn-primary d-flex ml-auto" type="submit">Guardar</button>
    </form>
  </div>
</div>
<script src="views/app/js/Estados.js"></script>
<script src="views/app/js/Ciudades.js"></script>