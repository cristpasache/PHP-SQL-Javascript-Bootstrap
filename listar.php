<?php

require_once('conexion.php');

$IdTrabajador = htmlspecialchars($_POST['idtrabajador'], ENT_QUOTES, 'UTF-8');
$IdPeriodo = htmlspecialchars($_POST['idperiodo'], ENT_QUOTES, 'UTF-8');
$idestados = htmlspecialchars($_POST['idestados'], ENT_QUOTES, 'UTF-8');

$sentencia = $pdo->prepare("EXEC PL_LISTAR_CALCULO_PLANILLA_EMPLEADO ?, ?, ?");
$sentencia->bindParam(1, $IdTrabajador);
$sentencia->bindParam(2, $IdPeriodo);
$sentencia->bindParam(3, $idestados);
$sentencia->execute();
$datos = $sentencia->fetchAll();

$data = array();
foreach ($datos as $row) {
	$data[] = array(
		"Codigo" 		=> $row['Codigo'],
		"DNI" 			=> $row['DNI'],
		"Apellidos" 	=> $row['Apellidos'],
		"Nombres" 		=> $row['Nombres'],
		"FechaIngreso" 	=> $row['FechaIngreso'],
		"TotalBruto" 	=> $row['TotalBruto'],
		"TotalDescuento"=> $row['TotalDescuento'],
		"TotalNeto" 	=> $row['TotalNeto'],
		"Estado" 		=> $row['Estado'],
	);
}

$response = array(
	"sEcho" => 1,
    "iTotalRecords"=> "0",
    "iTotalDisplayRecords"=> "0",
    "aaData" => $data
);

echo json_encode($response);

?>
