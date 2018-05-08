<?php include(HTML_DIR . 'overall/header.php'); ?>
<?php
if (isset($_SESSION['app_id'])) {
    header("location: index.php?view=homepage");
}

?>
	<body id="page-top" class="fixed-nav sticky-footer bg-dark">
        <div class="container">
            <div id="_AJAX_LOGIN_">
                
            </div>
            <div class="card card-login mx-auto mt-5">
                <div class="card-header">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <div role="form" onkeypress="return runScriptLogin(event)">
                        <div class="form-group">
                            <label>Usuario</label>
                            <input class="form-control" name="Usuario" id="Usuario" type="text" placeholder="Introduce tu usuario">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input class="form-control" name="Password" id="Password" type="password" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="session_login">
                                <label class="form-check-label" for="formCheck-1">Recordar contraseña</label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" type="button" name="btnLogin" id="btnLogin" onclick="goLogin()">Acceder</button>
                    </div>
                    <div class="text-center">
                        <a href="index.php?view=registro" class="d-block small mt-3">Crear una cuenta</a>
                        <a href="#" class="d-block small">Olvide mi contraseña</a>
                    </div>
                </div>
            </div>
        </div>

    <script src="views/app/js/login.js"></script>
    <?php include(HTML_DIR . 'overall/scripts.php'); ?>
	</body>
</html>