$(document).ready(function() {
  $("#btninfo").click(function(){
    $("#miinfo").show(1000);
    $("#editarinfo").hide(1000);

    $("#btninfo").hide();
    $("#btneditar").show();
  });
  $("#btneditar").click(function(){
    $("#miinfo").hide(1000);
    $("#editarinfo").show(1000);

    $("#btneditar").hide();
    $("#btninfo").show();   
  });

  $("#btnlogout").click(function(){
    window.location.href = "?view=salir";
  });
});