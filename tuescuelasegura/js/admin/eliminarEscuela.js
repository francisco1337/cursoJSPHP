document.querySelectorAll(".eliminarEscuela").forEach((nodo, index)=>{
    nodo.addEventListener("click", (boton)=> {
        let id = boton.target.id;

        formulario = new FormData();

        formulario.append( 'id', id ); 
        formulario.append( 'accion', 'eliminar' ); 

        fetch("/tuescuelasegura/admin/controladores/escuela.php", { // la ruta del backend 
            method: "POST",
            body: formulario // body es la información del formulario a enviar
        }).then(response => { // respuesta del servidor codigo 200 exito o 400,404, etc es error
            console.log(response); // respuesta del servidor codigo 200 exito o 400,404, etc es error
            return response.json(); // tomo solamente la respuesta json del servidor
        }).then( json => { // respuesta json del servidor
            console.log(json); // imprimir respuesta json del servidor
    
            if(json.exito) {
    
                swalInit.fire({
                    title: 'Eliminación Exitosa',
                    text: 'Registro Eliminado Correctamente!',
                    type: 'success',
                    showCloseButton: true
                });
                
                document.querySelector("#escuela"+id).innerHTML="";
                
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
})