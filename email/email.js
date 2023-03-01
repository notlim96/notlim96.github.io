// funcon recepionar datos del la vista 
function enviar_correo_milton(){
	var email = document.getElementById("email_milton_reg").value;
	var tema = document.getElementById("tema_milton_reg").value;
	var mensaje = document.getElementById("mensaje_milton_reg").value;

	if(email != "" || tema != "" || mensaje != ""){
			Swal.fire({
				  title: '¿Estas seguro?',
				  text: 'Los DATOS se enviaran a Ing. Milton Huaracc Palomino ...!!',
				  type: 'question',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Aceptar',
				  cancelButtonText: 'Cancelar'
			}).then((result) => {
				if (result.value) {
			  		let datos = new FormData();
			  		datos.append("milton_email_reg",email);
			  		datos.append("milton_tema_reg",tema);
			  		datos.append("milton_mensaje_reg",mensaje);

			  		fetch("email/emailAjax.php", {
			  			method: 'POST',
			  			body: datos
			  		})
			  		.then(respuesta => respuesta.text())
			  		.then(respuesta => {
						Swal.fire({
			              title: 'Para mejor detalle por Whatsapp.',
			              text: 'El mensaje fue derivado a Ing. Milton Huaracc Palomino.',
			              type: 'success',
			              confirmButtonText: 'Aceptar'
			            }).then((result) => {
							if (result.value) {
								// limpiamos campos
								document.getElementById("email_milton_reg").value = "";
								document.getElementById("tema_milton_reg").value = "";
								document.getElementById("mensaje_milton_reg").value = "";
							}
						});
					});
				}
			});
	  	}else{
		  	Swal.fire({
			  title: 'ocurrio un error',
			  text: 'seleccionar bien los Datos, campos vacios o sin definir..',
			  type: 'error',
			  confirmButtonText: 'Aceptar'
		    });
	  	}
}