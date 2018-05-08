// Call the dataTables jQuery plugin
$(document).ready(function() {
  var tablePropiedades = 
  $('#dataTablePropiedades').DataTable({
    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
         "<'row'<'col-md-12 text-center'B>>" +
         "<'row'<'col-md-12'tr>>" +
         "<'row'<'col-sm-12'i><'col-sm-12'p>>",
    responsive: true,
    colReorder: false,
    rowReorder: false,
    
    order: [[1, 'asc']],
    rowGroup: {
      startRender: null,
      startRender: function ( rows, group ) {
        return group +' ('+rows.count()+')';
    },
      dataSrc: 1
    },
    
    select: true,
    buttons: [
      { extend: 'copy', className: 'btn-copy' },
      'csv',
      { extend: 'excel', className: 'btn-excel' },
      { extend: 'pdf', className: 'btn-copy' },
      { extend: 'print', className: 'btn-copy' },
      'colvis'
    ],
    language: {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      },
      "buttons": {
        "copy": 'Copiar',
        "csv": 'Exportar a CSV',
        "excel": 'Exportar a Excel', 
        "pdf": 'Exportar en PDF',  
        "print": 'Imprimir', 
        "colvis": 'Columnas visibles'
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
  });
  $(".btn-copy").removeClass( "btn-secondary" ).addClass( "btn-primary" );
  $(".btn-excel").removeClass( "btn-secondary" ).addClass( "btn-success" );
  
  var tableDocumentos = 
  $('#dataTableDocumentos').DataTable({
    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
         "<'row'<'col-md-12 text-center'B>>" +
         "<'row'<'col-md-12'tr>>" +
         "<'row'<'col-sm-12'i><'col-sm-12'p>>",
    responsive: true,
    colReorder: true,
    rowReorder: true,
    
    order: [[0, 'asc']],
    rowGroup: {
      dataSrc: 0
    },
    
    select: true,
    buttons: [
      { extend: 'copy', className: 'btn-copy' },
      'csv',
      { extend: 'excel', className: 'btn-excel' },
      { extend: 'pdf', className: 'btn-copy' },
      { extend: 'print', className: 'btn-copy' },
      'colvis'
    ],
    language: {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      },
      "buttons": {
        "copy": 'Copiar',
        "csv": 'Exportar a CSV',
        "excel": 'Exportar a Excel', 
        "pdf": 'Exportar en PDF',  
        "print": 'Imprimir', 
        "colvis": 'Columnas visibles'
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
  });
  
  var tableDenyPermiso =
  $('#dataTableDenyPermiso').DataTable({
    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
         "<'row'<'col-md-12 text-center'B>>" +
         "<'row'<'col-md-12'tr>>" +
         "<'row'<'col-sm-12'i><'col-sm-12'p>>",
    responsive: true,
    colReorder: true,
    rowReorder: true,
    
    order: [[0, 'asc']],
    rowGroup: {
      dataSrc: 0
    },
    
    select: true,
    buttons: [
      { extend: 'copy', className: 'btn-copy' },
      'csv',
      { extend: 'excel', className: 'btn-excel' },
      { extend: 'pdf', className: 'btn-copy' },
      { extend: 'print', className: 'btn-copy' },
      'colvis'
    ],
    language: {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      },
      "buttons": {
        "copy": 'Copiar',
        "csv": 'Exportar a CSV',
        "excel": 'Exportar a Excel', 
        "pdf": 'Exportar en PDF',  
        "print": 'Imprimir', 
        "colvis": 'Columnas visibles'
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
  });
  
  var tableUsuarios =
  $('#dataTableUsuarios').DataTable({
    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
         "<'row'<'col-md-12 text-center'B>>" +
         "<'row'<'col-md-12'tr>>" +
         "<'row'<'col-sm-12'i><'col-sm-12'p>>",
    responsive: true,
    colReorder: true,
    rowReorder: true,
    
    order: [[0, 'asc']],
    rowGroup: {
      dataSrc: 0
    },
    
    select: true,
    buttons: [
      { extend: 'copy', className: 'btn-copy' },
      'csv',
      { extend: 'excel', className: 'btn-excel' },
      { extend: 'pdf', className: 'btn-copy' },
      { extend: 'print', className: 'btn-copy' },
      'colvis'
    ],
    language: {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      },
      "buttons": {
        "copy": 'Copiar',
        "csv": 'Exportar a CSV',
        "excel": 'Exportar a Excel', 
        "pdf": 'Exportar en PDF',  
        "print": 'Imprimir', 
        "colvis": 'Columnas visibles'
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
  });
  
  var tablePermisos =
  $('#dataTablePermiso').DataTable({
    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
         "<'row'<'col-md-12 text-center'B>>" +
         "<'row'<'col-md-12'tr>>" +
         "<'row'<'col-sm-12'i><'col-sm-12'p>>",
    responsive: true,
    colReorder: true,
    rowReorder: true,
    
    order: [[0, 'asc']],
    rowGroup: {
      dataSrc: 0
    },
    
    select: true,
    buttons: [
      { extend: 'copy', className: 'btn-copy' },
      'csv',
      { extend: 'excel', className: 'btn-excel' },
      { extend: 'pdf', className: 'btn-copy' },
      { extend: 'print', className: 'btn-copy' },
      'colvis'
    ],
    language: {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      },
      "buttons": {
        "copy": 'Copiar',
        "csv": 'Exportar a CSV',
        "excel": 'Exportar a Excel', 
        "pdf": 'Exportar en PDF',  
        "print": 'Imprimir', 
        "colvis": 'Columnas visibles'
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
  });
  
  var tableRoles =
  $('#dataTableRoles').DataTable({
    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
         "<'row'<'col-md-12 text-center'B>>" +
         "<'row'<'col-md-12'tr>>" +
         "<'row'<'col-sm-12'i><'col-sm-12'p>>",
    responsive: true,
    colReorder: true,
    rowReorder: true,    
    select: true,
    buttons: [
      { extend: 'copy', className: 'btn-copy' },
      'csv',
      { extend: 'excel', className: 'btn-excel' },
      { extend: 'pdf', className: 'btn-copy' },
      { extend: 'print', className: 'btn-copy' },
      'colvis'
    ],
    language: {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      },
      "buttons": {
        "copy": 'Copiar',
        "csv": 'Exportar a CSV',
        "excel": 'Exportar a Excel', 
        "pdf": 'Exportar en PDF',  
        "print": 'Imprimir', 
        "colvis": 'Columnas visibles'
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
  });

  var tablePaises =
  $('#dataTablePaises').DataTable({
    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
         "<'row'<'col-md-12 text-center'B>>" +
         "<'row'<'col-md-12'tr>>" +
         "<'row'<'col-sm-12'i><'col-sm-12'p>>",
    responsive: true,
    colReorder: true,
    rowReorder: true,    
    select: true,
    buttons: [
      { extend: 'copy', className: 'btn-copy' },
      'csv',
      { extend: 'excel', className: 'btn-excel' },
      { extend: 'pdf', className: 'btn-copy' },
      { extend: 'print', className: 'btn-copy' },
      'colvis'
    ],
    language: {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      },
      "buttons": {
        "copy": 'Copiar',
        "csv": 'Exportar a CSV',
        "excel": 'Exportar a Excel', 
        "pdf": 'Exportar en PDF',  
        "print": 'Imprimir', 
        "colvis": 'Columnas visibles'
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
  });
  
  
  var tableEstados =
  $('#dataTableEstados').DataTable({
    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
         "<'row'<'col-md-12 text-center'B>>" +
         "<'row'<'col-md-12'tr>>" +
         "<'row'<'col-sm-12'i><'col-sm-12'p>>",
    responsive: true,
    colReorder: true,
    rowReorder: true,    
    select: true,
    buttons: [
      { extend: 'copy', className: 'btn-copy' },
      'csv',
      { extend: 'excel', className: 'btn-excel' },
      { extend: 'pdf', className: 'btn-copy' },
      { extend: 'print', className: 'btn-copy' },
      'colvis'
    ],
    language: {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      },
      "buttons": {
        "copy": 'Copiar',
        "csv": 'Exportar a CSV',
        "excel": 'Exportar a Excel', 
        "pdf": 'Exportar en PDF',  
        "print": 'Imprimir', 
        "colvis": 'Columnas visibles'
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
  });

  
  var TableCiudades =
  $('#dataTableCiudades').DataTable({
    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
         "<'row'<'col-md-12 text-center'B>>" +
         "<'row'<'col-md-12'tr>>" +
         "<'row'<'col-sm-12'i><'col-sm-12'p>>",
    responsive: true,
    colReorder: true,
    rowReorder: true,    
    select: true,
    buttons: [
      { extend: 'copy', className: 'btn-copy' },
      'csv',
      { extend: 'excel', className: 'btn-excel' },
      { extend: 'pdf', className: 'btn-copy' },
      { extend: 'print', className: 'btn-copy' },
      'colvis'
    ],
    language: {
      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      },
      "buttons": {
        "copy": 'Copiar',
        "csv": 'Exportar a CSV',
        "excel": 'Exportar a Excel', 
        "pdf": 'Exportar en PDF',  
        "print": 'Imprimir', 
        "colvis": 'Columnas visibles'
      },
      "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
  });



});