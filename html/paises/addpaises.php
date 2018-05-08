<ol class="breadcrumb">
  <li class="breadcrumb-item"><a><span>Dashboard<br></span></a></li>
  <li class="breadcrumb-item"><a><span>Pais</span></a></li>
  <li class="breadcrumb-item"><a><span>Agregar pais</span></a></li>
</ol>
<div class="row">
  
  <?php
    if(isset($_GET['error'])){
      echo '<div class="col-12">
      <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4 class="alert-heading">Aviso:</h4>
        <p class="mb-0">Ha ocurrido un error al intentar guardar el pais</p>
      </div>';
    }

    if(isset($_GET['success'])){
      echo '<div class="col-12">
      <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4 class="alert-heading">Completado:</h4>
        <p class="mb-0">El pais ha sido agregado</p>
      </div>
      </div>';
    }
  ?>
  
  <div class="col-12">
    <form class="mb-2" action="?view=homepage&module=paises&mode=add" method="POST" enctype="application/x-www-form-urlencoded">
      <div class="form-group">
        <label>Estado</label>
        <input class="form-control" type="text" name="Pais" id="Pais">
      </div>
      <button class="btn btn-primary d-flex ml-auto" type="submit">Guardar</button>
    </form>
  </div>
</div>