<?php 

	require_once 'conexion.php';

	$idaño = htmlspecialchars($_POST['idanio'], ENT_QUOTES, 'UTF-8');
	$sentencia = $pdo->prepare("EXEC PL_LISTAR_MES_PLANILLA ?");
	$sentencia->bindParam(1, $idaño);
	$sentencia->execute();
	$json = array();
	        
	while($row = $sentencia->fetch()) {
	    $json[] = array(
	    	'IdPeriodo' => $row['IdPeriodo'],
	        'Mes'		=> $row['Mes'],
	    );
	}  

	$jsonstring = json_encode($json);
	echo $jsonstring;

?>