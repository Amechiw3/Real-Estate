<ol class="breadcrumb">
  <li class="breadcrumb-item"><a><span>Dashboard<br></span></a></li>
  <li class="breadcrumb-item"><a><span>Propiedades</span></a></li>
  <li class="breadcrumb-item"><a><span>Agregar propiedad</span></a></li>
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
        <p class="mb-0">La propiedad ha sido agregada</p>
      </div>
      </div>';
    }
  ?>
  
  <div class="col-12">
    <form class="mb-2" action="?view=homepage&module=propiedades&mode=add" method="POST" enctype="application/x-www-form-urlencoded">
      <div class="form-group">
        <label>Pais</label>
        <select class="form-control" name="Pais" id="Pais" onchange="chaEstados()">
          <option value="0">Selecciones un pais</option>
          <?php
            foreach ($resp_pai as $row => $item) {                
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
        <label>Municipio</label>
        <select class="form-control" name="Ciudad" id="Ciudad">
        </select>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-8">
            <label class="col-form-label">Colonia</label>
            <input class="form-control" type="text" name="Colonia" id="Colonia">
          </div>
          <div class="col-4">
            <label class="col-form-label">Codigo postal</label>
            <input class="form-control" type="text" name="CodigoPostal" id="CodigoPostal">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-8">
            <label class="col-form-label">Calle</label>
            <input class="form-control" type="text" name="Calle" id="Calle">
          </div>
          <div class="col-4">
            <label class="col-form-label">Numero</label>
            <input class="form-control" type="text" name="Numero" id="Numero">
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
            <input type="file" accept="image/*" name="imagenprop" required="" id="imagenprop">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-8">
              <label class="col-form-label">Tipo de propiedad</label>
              <select class="form-control" name="PropiedadTipo" id="PropiedadTipo">
                <optgroup label="This is a group">
                  <option value="1" selected="">Casa</option>
                  <option value="2">Departamento</option>
                  <option value="3">Terreno</option>
                </optgroup>
              </select>
            </div>
            <div class="col-4">
              <label class="col-form-label">Fecha de la propiedad</label>
              <input class="form-control" type="date" name="PropiedadFecha" id="PropiedadFecha">
            </div>
          </div>
      </div>
      <div class="form-group">
        <label>Precio</label>
        <input class="form-control" type="number" name="Precio" id="Precio">
      </div>
      <div class="form-group">
        <label>Informacion Adicional</label>
        <textarea class="form-control form-control-sm" name="InformacionAdic" id="InformacionAdic"></textarea>
      </div>
      <div class="form-group">
        <div class="form-row">
          <div class="col-6">
            <label class="col-form-label">Area</label>
            <input class="form-control" type="number" name="Area" id="Area">
          </div>
          <div class="col-6">
            <label class="col-form-label">Numero de cuartos</label>
            <input class="form-control" type="number" name="NumeroHab" id="NumeroHab">
          </div>
        </div>
      </div>
      <button class="btn btn-primary d-flex ml-auto" type="submit">Guardar</button>
    </form>
  </div>
</div>
<script src="views/app/js/Estados.js"></script>
<script src="views/app/js/Ciudades.js"></script>