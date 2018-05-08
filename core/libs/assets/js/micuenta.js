$(document).ready(function() {
  $("#btninfo").click(function(){
    $("#miinfo").show(1000);
    $("#editarinfo").hide(1000);
  });
  $("#btneditar").click(function(){
    $("#miinfo").hide(1000);
    $("#editarinfo").show(1000);
  });

  $("#btnlogout").click(function(){
    window.location.href = "?view=salir";
  });

});