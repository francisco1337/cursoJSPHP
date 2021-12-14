document.querySelector("#crearEscuelaForm").addEventListener("submit",(e)=>{
    e.preventDefault(); // DETIENE EL ENVIO DEL FORMULARIO PARA PODER SER PROCESADO POR JS
    
    formulario = new FormData(document.querySelector("#crearEscuelaForm"));

    formulario.append( 'accion', 'crear' ); // le agrega un input con el name accion y valor crear
    
    fetch("/tuescuelasegura/admin/controladores/escuela.php", { // la ruta del backend 
        method: "POST",
        body: formulario // body es la información del formulario a enviar
    }).then(response => { // respuesta del servidor codigo 200 exito o 400,404, etc es error
        console.log(response); // respuesta del servidor codigo 200 exito o 400,404, etc es error
        return response.json(); // tomo solamente la respuesta json del servidor
    }).then( json => { // respuesta json del servidor
        console.log(json); // imprimir respuesta json del servidor

        if(json.exito) {

            document.querySelector("#crearEscuelaForm").reset();
            swalInit.fire({
                title: 'Registro Exitoso',
                text: 'Registro Creado Correctamente!',
                type: 'success',
                showCloseButton: true
            });
        } else {
            swalInit.fire({
                title: 'Error',
                text: json.mensaje,
                type: 'error',
                showCloseButton: true
            });
        }

    });

});



