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

  if ($_POST['operacion'] == 'upload'){
    
    $nombreArchivo = '';
    if (isset($_FILES['fotografia'])){
      $rutaDestino = 'img/fotos-componentes/';
      $nombreTMP = sha1(date('c')) . ".jpg";
      $rutaDestino .= $nombreTMP;

      if (move_uploaded_file($_FILES['fotografia']['tmp_name'], $rutaDestino)){
        $nombreArchivo = $nombreTMP;
      }
    }

    $consulta = $conexion->prepare("INSERT INTO componentes (componente, fotografia) VALUES (?,?)");
    $consulta->execute(array($_POST['componente'], $nombreTMP));

    echo json_encode(["respuesta" => "OK", "nombreTMP" => $nombreTMP]);

  }

}