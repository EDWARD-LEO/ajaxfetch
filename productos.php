<?php

//Retorna la conexión
function getConexion(){
  try{
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=bdfetch;charset=UTF8","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  }catch(Exception $e){
    die($e->getMessage());
  }
}

//Recuperar la conexión
$conexion = getConexion();

if (isset($_POST['operacion'])){

  if ($_POST['operacion'] == 'listar'){
    $consulta = $conexion->prepare("SELECT * FROM productos");
    $consulta->execute();
    $datosObtenidos = $consulta->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($datosObtenidos);
  }

  if ($_POST['operacion'] == 'registrar'){
    
    $respuesta = ["status" => false, "mensaje" => ""];

    try{
      $consulta = $conexion->prepare("INSERT INTO productos (nombre, marca, precio) VALUES (?,?,?)");
      $respuesta["status"] = $consulta->execute(
        array(
          $_POST['nombre'],
          $_POST['marca'],
          $_POST['precio']
        )
      );
    }
    catch(Exception $e){
      //getCode() - getFile() - getMessage() - getLine() - getPrevious() - getTrace() - getTraceAsString()
      $respuesta["mensaje"] = "No se ha podido completar el proceso, código de error: " . $e->getCode();
    }
    
    echo json_encode($respuesta);
  }

  if ($_POST['operacion'] == 'eliminar'){
    $respuesta = ["finished" => false];
    
    $consulta = $conexion->prepare("DELETE FROM productos WHERE idproducto = ?");
    $respuesta["finished"] = $consulta->execute(array($_POST['idproducto']));
    echo json_encode($respuesta);
  }

}




?>