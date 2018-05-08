$(document).ready(function() {
	//$('#btnRegistrar').click(function(event) {
		$("#frmRegistro").validate({
			debug: true,
			rules: {
				Nombre: { required: true, minlength: 2},
				Appaterno: { required: true, minlength: 2},
				Apmaterno: { required: true, minlength: 2},
				Telefono: { required: true, minlength: 2, maxlength: 15},
				Usuario: { required:true, minlength: 2},
				Password: { required:true, minlength: 8},
				RePassword: { required:true, equalTo: "#Password" },
				Email: { required:true, email: true}
			},
			messages: {
				Nombre: "El campo es obligatorio.",
				Appaterno: "El campo es obligatorio.",
				Apmaterno: "El campo es obligatorio.",
				Telefono : "El campo Tel&eacute;fono no contiene un formato correcto.",
				Usuario: "El campo es obligatorio.",
				Password: "El campo es obligatorio. y debe contener minimo 8 caracteres",
				RePassword: "La contraseña debe coincidir",
				Email: {
					required: "El campo es obligatorio",
					email: "El correo electronico debe tener un formato correcto"
				}
			}
		});
	//});

	$("#frmLogin").validate({
		rules: {
			Usuario: { required: true },
			Password: { required: true }
		},
		messages: {
			Usuario: "El campo es necesario para poder acceder",
			Password: "El campo es obligatorio para el acceso"
		}
	});
});