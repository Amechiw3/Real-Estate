function runScriptReg(e) {
    if(e.keyCode == 13) {
        goReg();

    }
}

function goReg() {
    var connect, form, response, result, Nombre, Appaterno, Apmaterno, Telefono, Usuario, Password, RePassword, Email, tyc;

    Nombre      = __("Nombre").value;
    Appaterno   = __("Appaterno").value;
    Apmaterno   = __("Apmaterno").value;
    Telefono    = __("Telefono").value;
    Usuario     = __("Usuario").value;
    Password    = __("Password").value;
    RePassword  = __("RePassword").value;
    Email       = __("Email").value;
    tyc         = __("tyc").checked ? true : false;

    if( tyc ) {
        if(Nombre != "" && Appaterno != "" && Apmaterno != "" && Telefono != "" && Usuario != "" && Password != "" && RePassword != "" && Email != "") {
            if(Password == RePassword) {
                form = 'Nombre=' + Nombre + '&Appaterno=' + Appaterno + '&Apmaterno=' + Apmaterno + '&Telefono=' + Telefono + '&Usuario=' + Usuario + '&Password=' + Password + '&Email=' + Email;
                connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                connect.onreadystatechange = function() {
                    if(connect.readyState == 4 && connect.status == 200) {
                        if(connect.responseText == 1){
                            result = '<div class="alert alert-dismissible alert-success">';
                            result +='<button type="button" class="close" data-dismiss="alert">&times;</button>';
                            result +='<h4 class="alert-heading">Registro completado</h4>';
                            result +='<p class="mb-0"><strong>Estamos redireccionandote...</strong></p>';
                            result +='</div>';
                            __('_AJAX_REG_').innerHTML = result;
                            location.reload();
                        } else {
                            __('_AJAX_REG_').innerHTML = connect.responseText;
                        }
                    } else if(connect.readyState != 4) {
                        result = '<div class="alert alert-dismissible alert-warning">';
                        result +='<button type="button" class="close" data-dismiss="alert">&times;</button>';
                        result +='<h4 class="alert-heading">Procesado...</h4>';
                        result +='<p class="mb-0"><strong>Estamos procesando tu registro</strong></p>';
                        result +='</div>';
                        __('_AJAX_REG_').innerHTML = result;
                    }
                }
                connect.open('POST', 'ajax.php?mode=reg', true);
                connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                connect.send(form);
            } else {
                result = '<div class="alert alert-dismissible alert-danger">';
                result +='<button type="button" class="close" data-dismiss="alert">&times;</button>';
                result +='<h4 class="alert-heading">Error</h4>';
                result +='<p class="mb-0"><strong>Las contraseñas no coinciden.</strong></p>';
                result +='</div>';
                __('_AJAX_REG_').innerHTML = result;
            }
        } else {
            result = '<div class="alert alert-dismissible alert-danger">';
            result +='<button type="button" class="close" data-dismiss="alert">&times;</button>';
            result +='<h4 class="alert-heading">Error</h4>';
            result +='<p class="mb-0"><strong>Todos los campos son requeridos</strong></p>';
            result +='</div>';
            __('_AJAX_REG_').innerHTML = result;

        }
    } else {
        result = '<div class="alert alert-dismissible alert-danger">';
        result +='<button type="button" class="close" data-dismiss="alert">&times;</button>';
        result +='<h4 class="alert-heading">Error</h4>';
        result +='<p class="mb-0"><strong>Los términos y condiciones deben ser aceptados.</strong></p>';
        result +='</div>';
        __('_AJAX_REG_').innerHTML = result;
    }
}