function runScriptEstados(e) {
    if(e.keyCode == 13) {
        chaEstados();

    }
}

function chaEstados() {
    var connect, form, response, result, Pais;
    Pais = __("Pais").value;    
    form = 'Pais=' + Pais;
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    connect.onreadystatechange = function() {
        if(connect.readyState == 4 && connect.status == 200) {
            __('Estado').innerHTML = connect.responseText;
        }
    }
    connect.open('POST', 'ajax.php?mode=chaEstados', true);
    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    connect.send(form);
}