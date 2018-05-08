<?php include(HTML_DIR . 'overall/header.php'); ?>
<?php
if (isset($_SESSION['app_id'])) {
    header("location: index.php?view=homepage");
}

?>
    <body id="page-top" class="fixed-nav sticky-footer bg-dark">
        <div class="container">
            <div id="_AJAX_REG_">
            </div>
            <div class="card card-register mx-auto">
                <div class="card-header">
                    <h4>Registro</h4>
                </div>
                <div class="card-body">
                    <div role="form" id="frmRegistro" onkeypress="return runScriptReg(event)">
                        <div class="form-group">
                            <label for="Nombre">Nombre</label>
                            <input class="form-control form-control-sm required" type="text" name="Nombre" id="Nombre">
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label class="col-form-label" for="Appaterno">Apellido paterno</label>
                                    <input class="form-control form-control-sm" type="text" name="Appaterno" id="Appaterno">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label" for="Apmaterno">Apellido materno</label>
                                    <input class="form-control form-control-sm" type="text" name="Apmaterno" id="Apmaterno">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Telefono">Telefono</label>
                            <input class="form-control form-control-sm" type="tel" name="Telefono" id="Telefono">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="Usuario">Usuario</label>
                            <input class="form-control form-control-sm" type="text" name="Usuario" id="Usuario">
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label class="col-form-label" for="Password">Contraseña</label>
                                    <input class="form-control form-control-sm" type="password" name="Password" id="Password">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label" for="RePassword">Confirmar contraseña</label>
                                    <input class="form-control form-control-sm" type="password" name="RePassword" id="RePassword">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="Email">Correo electronico</label>
                            <input class="form-control form-control-sm" type="email" name="Email" id="Email">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tyc">
                                <label class="form-check-label" for="formCheck-1">Terminos y condiciones</label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" id="btnRegistrar" name="btnRegistrar" type="button" onclick="goReg()">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="views/app/js/reg.js"></script>
    <?php include(HTML_DIR . 'overall/scripts.php'); ?>
	</body>
</html>