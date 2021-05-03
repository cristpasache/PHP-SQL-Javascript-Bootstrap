<?php 

$link = 'sqlsrv:Server=192.168.1.56;Database=BD_Planilla';
$usuario = 'sa';
$pass = '123';

try {
  $pdo = new PDO($link, $usuario, $pass);
  //echo 'Conectado';
} catch (PDOException $e) {
  print "!Error!: " . $e->getMessage() . "<br/>";
  die();
}

?>