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

}

?>