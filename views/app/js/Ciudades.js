function runScriptCiudad(e) {
    if(e.keyCode == 13) {
        chaCiudad();

    }
}

function chaCiudad() {
    var connect, form, response, result, Estado;
    Estado = __("Estado").value;    
    form = 'Estado=' + Estado;
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    connect.onreadystatechange = function() {
        if(connect.readyState == 4 && connect.status == 200) {
            __('Ciudad').innerHTML = connect.responseText;
            
        }
    }
    connect.open('POST', 'ajax.php?mode=chaCiudades', true);
    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    connect.send(form);
}