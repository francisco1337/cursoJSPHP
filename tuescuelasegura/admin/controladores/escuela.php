<?php
require_once("../../funciones/conexion.php");

if( $_POST["accion"] == "crear") {
    $nombreEscuela = $_POST["nombreEscuela"];

    $sql = "INSERT INTO escuelas (escuela) VALUES ('$nombreEscuela')";

    if ($conn->query($sql) == TRUE) {
        $response = [ "exito" => TRUE ];
    } else {
        $response=[ "exito" => FALSE, "mensaje" => "NO SE CREO ESCUELA CORRECTAMENTE, FAVOR INTENTAR OTRA VEZ" ];
    }

    
    die(json_encode( $response));
    $conn->close();
    
    
}

if( $_POST["accion"] == "modificar" ) {
    

    $id = $_POST["id"];
    $nombreEscuela = $_POST["nombreEscuela"];

    $sql = "UPDATE escuelas SET escuela='$nombreEscuela' WHERE id='$id'";

    if ($conn->query($sql) == TRUE) {
        $response = [ "exito" =>TRUE];
    } else {
        $response=[ "exito" => FALSE, "mensaje" => "Error Actualizando Registro: " ];
    }
    die(json_encode( $response ));

    $conn->close();
}  

if( $_POST["accion"] == "eliminar") {


    $id = $_POST["id"];

    

    $sql = "DELETE  FROM escuelas WHERE id = $id";

    

    if ($conn->query($sql) == TRUE) {
        $response = [ "exito" => TRUE ];
    } else {
        $response=[ "exito" => FALSE, "mensaje" => "NO SE CREO ESCUELA CORRECTAMENTE, FAVOR INTENTAR OTRA VEZ" ];
    }

    
    die(json_encode( $response));
    $conn->close();
    
    
}





